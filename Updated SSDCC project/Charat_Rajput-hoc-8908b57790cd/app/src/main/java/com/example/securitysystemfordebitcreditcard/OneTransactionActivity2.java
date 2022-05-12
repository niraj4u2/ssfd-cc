package com.example.securitysystemfordebitcreditcard;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

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

public class OneTransactionActivity2 extends AppCompatActivity implements View.OnClickListener {
    PinView firstPinView;
    Button btnShop;
    RelativeLayout imgBack;
    CardView cv;
    public static final String preferences = "preferences";
    SharedPreferences sharedPreferences;
    String current, entered;
    TextView tvMessage;
    ImageView ivPassToggle;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_one_transaction2);
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
        btnShop.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                isVailid();
                if (isVailid() == true) {
                    if (entered.length() < 4) {
                        Toast.makeText(OneTransactionActivity2.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
                    } else if (current.equals(entered)) {
                        Intent intent=new Intent(getApplicationContext(),ChangePassActivity1.class);
                        intent.putExtra("op", "Option 7.");
                        intent.putExtra("msg", "One transaction will be allowed for either ATM or shopping, card will automatically lock-up after one time use.");
                        startActivity(intent);
                        finish();
                      ///     "or shopping, card will automatically lock-up after one time use.", Toast.LENGTH_LONG).show();
                    } else {
                        Toast.makeText(OneTransactionActivity2.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();
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
        btnShop = findViewById(R.id.btnUnlock);
        imgBack = findViewById(R.id.imgBack);
        //cv = findViewById(R.id.cv);

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