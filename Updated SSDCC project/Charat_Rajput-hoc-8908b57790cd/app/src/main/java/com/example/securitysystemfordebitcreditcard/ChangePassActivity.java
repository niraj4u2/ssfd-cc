package com.example.securitysystemfordebitcreditcard;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.chaos.view.PinView;

public class ChangePassActivity extends AppCompatActivity implements View.OnClickListener {
    PinView firstPinView, firstPinView1, firstPinViewLOGIN;
    Button btnReset;
    TextView tve1, tve;
    ImageView imgBack;
    SharedPreferences sharedPreferences;
    public static final String preferences = "preferences";
    String current, old, newpin, pin;
    private ImageView ivPassToggle, ivPassToggle1, ivPassToggle2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        ChangePassActivity.this.setTitle("Services & Support");
        setContentView(R.layout.activity_change_pass);

        sharedPreferences = getSharedPreferences(preferences, this.MODE_PRIVATE);
        init();
        imgBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();

            }
        });
        btnReset.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (isVailid()) {
                    String old1 = (sharedPreferences.getString("DCP", ""));
                    current = sharedPreferences.getString("pin", "");
                    old = firstPinView.getText().toString().trim();
                    newpin = firstPinView1.getText().toString().trim();
                    pin = firstPinViewLOGIN.getText().toString().trim();


                    //tve.setText(current);
                    if (!old1.equals(old) && !pin.equals(current)) {
                        Toast.makeText(ChangePassActivity.this, "Enter correct old card password and login pin.", Toast.LENGTH_SHORT).show();

                    } else if (old1.equals(old)) {
                        if (pin.equals(current)) {
                            SharedPreferences.Editor editor = sharedPreferences.edit();
                            editor.putString("DCP", newpin);
                            editor.apply();
                            Intent intent = new Intent(getApplicationContext(), ChangePassActivity1.class);
                            intent.putExtra("op", "Option 1.");
                            intent.putExtra("msg", "Your card password has been changed.");
                            startActivity(intent);
                            //Toast.makeText(ChangePassActivity.this, "Your card password has been changed.", Toast.LENGTH_SHORT).show();
                            finish();
                        } else {
                            Toast.makeText(ChangePassActivity.this, "Enter correct login pin", Toast.LENGTH_SHORT).show();

                        }
                    } else {
                        Toast.makeText(ChangePassActivity.this, "Enter correct old card password", Toast.LENGTH_SHORT).show();

                    }
                }
            }
        });
    }

    private boolean isVailid() {
        old = firstPinView.getText().toString().trim();
        newpin = firstPinView1.getText().toString().trim();
        pin = firstPinViewLOGIN.getText().toString().trim();
        if (old.isEmpty()) {
            Toast.makeText(getApplicationContext(), "Enter old password of card", Toast.LENGTH_SHORT).show();
            return false;
        } else if (newpin.isEmpty()) {
            Toast.makeText(getApplicationContext(), "Enter new password of card", Toast.LENGTH_SHORT).show();
            return false;
        } else if (pin.isEmpty()) {
            Toast.makeText(getApplicationContext(), "Enter login pin", Toast.LENGTH_SHORT).show();
            return false;
        } else if (old.length() < 4 && pin.length() < 4 && newpin.length() < 4) {
            Toast.makeText(getApplicationContext(), "Enter correct old password of card, new password of card and login pin", Toast.LENGTH_SHORT).show();
            return false;
        } else if (old.length() < 4 && pin.length() < 4) {
            Toast.makeText(getApplicationContext(), "Enter correct old password of card and login pin", Toast.LENGTH_SHORT).show();
            return false;
        } else if (old.length() < 4 && newpin.length() < 4) {
            Toast.makeText(getApplicationContext(), "Enter correct old password of card and complete new password of card", Toast.LENGTH_SHORT).show();
            return false;
        } else if (old.length() < 4) {
            Toast.makeText(getApplicationContext(), "Enter correct old password of card", Toast.LENGTH_SHORT).show();
            return false;
        } else if (newpin.length() < 4 && pin.length() < 4) {
            Toast.makeText(getApplicationContext(), "Enter complete new password of card and correct login pin", Toast.LENGTH_SHORT).show();
            return false;
        } else if (newpin.length() < 4) {
            Toast.makeText(getApplicationContext(), "Enter complete new password of card", Toast.LENGTH_SHORT).show();
            return false;
        } else if (pin.length() < 4) {
            Toast.makeText(getApplicationContext(), "Enter correct login pin", Toast.LENGTH_SHORT).show();
            return false;
        }
        return true;
    }

    private void init() {
        firstPinView = findViewById(R.id.firstPinView);
        firstPinView1 = findViewById(R.id.firstPinView1);
        firstPinViewLOGIN = findViewById(R.id.firstPinViewLOGIN);
        imgBack = findViewById(R.id.imgBack);
        btnReset = findViewById(R.id.btnReset);
        tve1 = findViewById(R.id.tve1);
        tve = findViewById(R.id.tve);
        ivPassToggle = findViewById(R.id.ivPassToggle);
        ivPassToggle1 = findViewById(R.id.ivPassToggle1);
        ivPassToggle2 = findViewById(R.id.ivPassToggle2);
        ivPassToggle.setOnClickListener(this);
        ivPassToggle1.setOnClickListener(this);
        ivPassToggle2.setOnClickListener(this);
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
        } else if (v.getId() == R.id.ivPassToggle1) {

            if (firstPinView1.isPasswordHidden()) {
                firstPinView1.setPasswordHidden(false);
                ivPassToggle1.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_pass));
            } else {
                firstPinView1.setPasswordHidden(true);
                ivPassToggle1.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_hide_pass));

            }
        } else if (v.getId() == R.id.ivPassToggle2) {

            if (firstPinViewLOGIN.isPasswordHidden()) {
                firstPinViewLOGIN.setPasswordHidden(false);
                ivPassToggle2.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_pass));
            } else {
                firstPinViewLOGIN.setPasswordHidden(true);
                ivPassToggle2.setImageDrawable(getResources().getDrawable(R.drawable.ic_eye_hide_pass));

            }
        }

    }

}