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
import com.chaos.view.PinView;
import com.example.securitysystemfordebitcreditcard.utils.CheckInternet;
import com.example.securitysystemfordebitcreditcard.webservice.ApiCall;

import java.util.HashMap;


public class LostActivity extends AppCompatActivity implements View.OnClickListener {
    PinView firstPinView;
    Button btnLocked;
    RelativeLayout imgBack;
    SharedPreferences sharedPreferences;
    public static final String preferences = "preferences";
    String current, entered;
    ImageView ivPassToggle;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lost);
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
        btnLocked.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                isVailid();
                if (isVailid() == true) {
                    if (entered.length() < 4) {
                        Toast.makeText(LostActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
                    } else if (current.equals(entered)) {
                        if (!CheckInternet.isConnectedNetwork(LostActivity.this)) {
                            Toast.makeText(LostActivity.this, "Please connect to internet", Toast.LENGTH_SHORT).show();
                            return;
                        }
                        ApiCall apiCall = new ApiCall();
                        String accountNum = sharedPreferences.getString("account", "");
                        HashMap<String, String> params = new HashMap<>();
                        params.put("card_status", "2");
                        params.put("account_num", accountNum);
                        apiCall.callApi(LostActivity.this, ApiData.cardStatusUpdate, Request.Method.POST, params, response -> {
                            try {
                                if (response.get("status").equals(true)) {
                                    Intent intent = new Intent(getApplicationContext(), ChangePassActivity1.class);
                                    intent.putExtra("op", "Option 3.");
                                    intent.putExtra("msg", "Your card has been temporarily locked.");
                                    SharedPreferences.Editor editor = sharedPreferences.edit();
                                    editor.putBoolean("Card_Lost", true);
                                    editor.apply();
                                    startActivity(intent);
                                    finish();
                                } else {
                                    Toast.makeText(LostActivity.this, response.getString("message"), Toast.LENGTH_SHORT).show();
                                }
                            } catch (Exception e) {
                                e.printStackTrace();
                            }

                        }, error -> Toast.makeText(LostActivity.this, "Unable to lock card", Toast.LENGTH_SHORT).show());

                        //  Toast.makeText(BlockActivity.this, "Your card has been blocked)", Toast.LENGTH_SHORT).show();
                    } else {
                        Toast.makeText(LostActivity.this, "Enter correct login pin.", Toast.LENGTH_SHORT).show();
                    }

                    // Toast.makeText(LostActivity.this, "Your card has been locked", Toast.LENGTH_SHORT).show();
                } else {
                    Toast.makeText(LostActivity.this, "Enter correct details", Toast.LENGTH_SHORT).show();
                }
            }

        });
    }

    private void init() {
        firstPinView = findViewById(R.id.firstPinView);
        btnLocked = findViewById(R.id.btnLocked);
        imgBack = findViewById(R.id.imgBack);

        ivPassToggle = findViewById(R.id.ivPassToggle);
        firstPinView.setAnimationEnable(true);
        ivPassToggle.setOnClickListener(this);
    }

    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
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