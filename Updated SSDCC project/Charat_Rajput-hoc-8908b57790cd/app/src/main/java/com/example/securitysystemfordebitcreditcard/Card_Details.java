package com.example.securitysystemfordebitcreditcard;

import static com.example.securitysystemfordebitcreditcard.LogInActivity.preferences;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import java.util.Random;

public class Card_Details extends AppCompatActivity {
     TextView  tvCOS,tvDCP,tvTime;
     Button btnOk;
     String COS,DCP;
    SharedPreferences sharedPreferences;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_card_details);
        sharedPreferences = getSharedPreferences(preferences, this.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.putBoolean("Card_Block", false);
        editor.putBoolean("Card_Lost", false);
        editor.apply();
        init();
        Random rand = new Random();
         COS = String.format("%04d", rand.nextInt(10000));
         DCP = String.format("%04d", rand.nextInt(10000));

        tvDCP.setText(DCP);
        tvCOS.setText(COS);


        btnOk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                SharedPreferences.Editor editor = sharedPreferences.edit();
                editor.putString("DCP", DCP);
                editor.putString("COS", COS);
                Intent i = new Intent(getApplicationContext(),LogInActivity.class);
                startActivity(i);
                finish();
                editor.apply();
                editor.commit();


            }
        });

    }

    private void init() {
        btnOk = findViewById(R.id.btnOk);
        tvCOS = findViewById(R.id.tvCOS);
        tvDCP = findViewById(R.id.tvDCP);
        tvTime = findViewById(R.id.tvTime);
    }
}