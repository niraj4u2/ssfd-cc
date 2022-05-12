package com.example.securitysystemfordebitcreditcard;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.chaos.view.PinView;
import com.example.securitysystemfordebitcreditcard.utils.CheckInternet;
import com.example.securitysystemfordebitcreditcard.webservice.ApiCall;

import java.util.HashMap;

public class BlockActivity extends AppCompatActivity implements Response.Listener, Response.ErrorListener, View.OnClickListener {
    PinView firstPinView;
    Button btnBlocked;
    public static final String preferences = "preferences";
    SharedPreferences sharedPreferences;
    String current, entered;
    RelativeLayout imgBack;
    private ImageView ivPassToggle;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_block);
        BlockActivity.this.setTitle("Services & Support");
        sharedPreferences = getSharedPreferences(preferences, this.MODE_PRIVATE);

        init();
        clickButton();
    }

    private void clickButton() {
        imgBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();

            }
        });
        btnBlocked.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                isVailid();
                if (isVailid() == true) {
                    if (entered.length() < 4) {
                        Toast.makeText(BlockActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
                    } else if (current.equals(entered)) {
                        if (!CheckInternet.isConnectedNetwork(BlockActivity.this)) {
                            Toast.makeText(BlockActivity.this, "Please connect to internet", Toast.LENGTH_SHORT).show();
                            return;
                        }
                        ApiCall apiCall = new ApiCall();
                        String accountNum = sharedPreferences.getString("account", "");
                        HashMap<String, String> params = new HashMap<>();
                        params.put("account_num", accountNum);
                        params.put("card_status", "0");
                        apiCall.callApi(BlockActivity.this, ApiData.cardStatusUpdate, Request.Method.POST, params, response -> {
                            try {
                                if (response.get("status").equals(true)) {
                                    Intent intent = new Intent(getApplicationContext(), ChangePassActivity1.class);
                                    intent.putExtra("op", "Option 5.");
                                    SharedPreferences.Editor editor = sharedPreferences.edit();
                                    editor.putBoolean("Card_Block", true);
                                    editor.apply();
                                    intent.putExtra("msg", "Your card has been blocked permanently, contact your bank for re-issue of new card.");
                                    startActivity(intent);
                                    finish();
                                } else {
                                    Toast.makeText(BlockActivity.this, response.getString("message"), Toast.LENGTH_SHORT).show();
                                }
                            } catch (Exception e) {
                                e.printStackTrace();
                            }

                        }, error -> Toast.makeText(BlockActivity.this, "Unable to block card", Toast.LENGTH_SHORT).show());

                        //  Toast.makeText(BlockActivity.this, "Your card has been blocked)", Toast.LENGTH_SHORT).show();
                    } else {
                        Toast.makeText(BlockActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
                    }
                }
            }
        });
    }

    private boolean isVailid() {
        entered = firstPinView.getText().toString();
        if (entered.isEmpty()) {
            firstPinView.setError("Enter login pin");
            return false;
        }
        current = sharedPreferences.getString("pin", "");
        return true;
    }

    private void init() {
        firstPinView = findViewById(R.id.firstPinView);
        btnBlocked = findViewById(R.id.btnLocked);
        imgBack = findViewById(R.id.imgBack);
        ivPassToggle = findViewById(R.id.ivPassToggle);
        firstPinView.setAnimationEnable(true);
        ivPassToggle.setOnClickListener(this); }

    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
    }

    @Override
    public void onErrorResponse(VolleyError error) {

    }

    @Override
    public void onResponse(Object response) {

    }

    

    @Override
    public void onClick(View v) {
        if (v.getId() == R.id.ivPassToggle) {
            
            if(firstPinView.isPasswordHidden()){
                firstPinView.setPasswordHidden(false);
                ivPassToggle.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_pass));
            }else{
                firstPinView.setPasswordHidden(true);
                ivPassToggle.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_hide_pass));

            }
        }

    }
}