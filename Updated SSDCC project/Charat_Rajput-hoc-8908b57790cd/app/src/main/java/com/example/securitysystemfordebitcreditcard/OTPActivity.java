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
import android.widget.TextView;
import android.widget.Toast;

import com.chaos.view.PinView;

import java.util.Random;

public class OTPActivity extends AppCompatActivity implements View.OnClickListener {
    PinView firstPinView;
    Button btnUnlock;
    RelativeLayout imgBack;
    RelativeLayout rl2,rl123;
    TextView tvRandom;
    public static final String preferences = "preferences";
    SharedPreferences sharedPreferences;
    String current, entered;
    ImageView ivPassToggle;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_o_t_p);
        sharedPreferences = getSharedPreferences(preferences, this.MODE_PRIVATE);
        init();
        clickButton();
    }
    private void init() {
        firstPinView = findViewById(R.id.firstPinView);
        btnUnlock = findViewById(R.id.btnLocked);

        imgBack = findViewById(R.id.imgBack);
        ivPassToggle = findViewById(R.id.ivPassToggle);
        firstPinView.setAnimationEnable(true);
        ivPassToggle.setOnClickListener(this);

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
                        Toast.makeText(OTPActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
                    } else if (current.equals(entered))
                    {

                        Intent intent=new Intent(getApplicationContext(),OTP.class);
                        intent.putExtra("op", "Option 6.");
                        Random rand1 = new Random();
                        String COS = String.format("%04d", rand1.nextInt(10000));
                        intent.putExtra("msg",COS );
                        startActivity(intent);
                        finish();
                    } else {
                        Toast.makeText(OTPActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
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