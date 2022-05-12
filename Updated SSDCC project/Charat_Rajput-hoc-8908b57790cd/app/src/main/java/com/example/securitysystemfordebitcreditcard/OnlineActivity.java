package com.example.securitysystemfordebitcreditcard;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.chaos.view.PinView;


public class OnlineActivity extends AppCompatActivity implements View.OnClickListener {
    PinView firstPinView;
    Button btnSave;
    CardView cv;
    RelativeLayout imgBack;
    RelativeLayout rl1;
    TextView tv12;
    EditText eTAmount, eTFrequency;
    public static final String preferences = "preferences";
    SharedPreferences sharedPreferences;
    String current, entered, a, f;
    ImageView ivPassToggle;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        sharedPreferences = getSharedPreferences(preferences, this.MODE_PRIVATE);

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_online);

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
        btnSave.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                isVailid();
                //  Toast.makeText(getApplicationContext(), ""+(sharedPreferences.getString("COS", "")), Toast.LENGTH_SHORT).show();

                if (isVailid()) {
                    String OSC = sharedPreferences.getString("COS", "");

                    if (!current.equalsIgnoreCase(entered) && !eTAmount.getText().toString().equals(OSC)) {
                        Toast.makeText(getApplicationContext(), "Enter correct code for online service and login pin", Toast.LENGTH_SHORT).show();

                    } else if (entered.length() < 4) {
                        Toast.makeText(getApplicationContext(), "Enter correct login pin", Toast.LENGTH_SHORT).show();
                    } else if (current.equals(entered)) {

                        if (eTAmount.getText().toString().equals(OSC)) {
                            Intent intent = new Intent(getApplicationContext(), ChangePassActivity1.class);
                            intent.putExtra("op", "Option 11.");
                            intent.putExtra("msg", "One online transaction will be allowed and card will automatically lock-up after one time use.");
                            startActivity(intent);
                            finish();
                        } else {
                            Toast.makeText(getApplicationContext(), "Enter correct code for online service", Toast.LENGTH_SHORT).show();
                        }

                    } else {
                        Toast.makeText(getApplicationContext(), "Enter correct login pin", Toast.LENGTH_SHORT).show();
                    }
                }
            }
        });
    }

    private void init() {
        firstPinView = findViewById(R.id.firstPinView);
        btnSave = findViewById(R.id.btnSave);
        eTAmount = findViewById(R.id.eTAmount);
        // cv = findViewById(R.id.cv);
        imgBack = findViewById(R.id.imgBack);
        //  tv12 = findViewById(R.id.tv12);
        rl1 = findViewById(R.id.rl1);
        ivPassToggle = findViewById(R.id.ivPassToggle);
        firstPinView.setAnimationEnable(true);
        ivPassToggle.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        if (v.getId() == R.id.ivPassToggle) {

            if (firstPinView.isPasswordHidden()) {
                firstPinView.setPasswordHidden(false);
                ivPassToggle.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_pass));
            } else {
                firstPinView.setPasswordHidden(true);
                ivPassToggle.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_hide_pass));

            }
        }

    }

    private boolean isVailid() {
        current = sharedPreferences.getString("pin", "");
        entered = firstPinView.getText().toString();
        a = eTAmount.getText().toString();
        if (a.isEmpty()) {
            eTAmount.setError("Enter code for online service");
            return false;
        }

        if (entered.isEmpty()) {
            firstPinView.setError("Enter correct pin");
            return false;
        }
        return true;

    }

}