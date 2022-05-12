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

public class UnlockActivity extends AppCompatActivity implements View.OnClickListener {
    PinView firstPinView;
    RelativeLayout imgBack;
    Button btnUnlock;
    public static final String preferences = "preferences";
    SharedPreferences sharedPreferences;
    String current, entered;
    private ImageView ivPassToggle;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_unlock);
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
        btnUnlock.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                isVailid();
                if (isVailid() == true) {
                    if (entered.length() < 4) {
                        Toast.makeText(UnlockActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
                    } else if (current.equals(entered)) {
                        if (!CheckInternet.isConnectedNetwork(UnlockActivity.this)) {
                            Toast.makeText(UnlockActivity.this, "Please connect to internet", Toast.LENGTH_SHORT).show();
                            return;
                        }
                        ApiCall apiCall = new ApiCall();
                        String accountNum = sharedPreferences.getString("account", "");
                        HashMap<String, String> params = new HashMap<>();
                        params.put("card_status", "1");
                        params.put("account_num", accountNum);
                        apiCall.callApi(UnlockActivity.this, ApiData.cardStatusUpdate, Request.Method.POST, params, response -> {
                            try {
                                if (response.get("status").equals(true)) {
                                    Intent intent = new Intent(getApplicationContext(), ChangePassActivity1.class);
                                    intent.putExtra("op", "Option 4.");
                                    intent.putExtra("msg", "Your card has been unlocked.");
                                    startActivity(intent);
                                    finish();
                                    SharedPreferences.Editor editor = sharedPreferences.edit();
                                    editor.putBoolean("Card_Lost", false);
                                    editor.apply();
                                } else {
                                    Toast.makeText(UnlockActivity.this, response.getString("message"), Toast.LENGTH_SHORT).show();
                                }
                            } catch (Exception e) {
                                e.printStackTrace();
                            }
                        }, error -> Toast.makeText(UnlockActivity.this, "Unable to unlock card", Toast.LENGTH_SHORT).show());


                        // Toast.makeText(UnlockActivity.this, "Your card has been unlocked", Toast.LENGTH_LONG).show();
                    } else {
                        Toast.makeText(UnlockActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
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
        btnUnlock = findViewById(R.id.btnUnlock);
        imgBack = findViewById(R.id.imgBack);

        ivPassToggle = findViewById(R.id.ivPassToggle);
        firstPinView.setAnimationEnable(true);
        ivPassToggle.setOnClickListener(this);
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