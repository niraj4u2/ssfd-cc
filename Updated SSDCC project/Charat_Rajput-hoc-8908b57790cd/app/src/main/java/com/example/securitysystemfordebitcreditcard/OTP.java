package com.example.securitysystemfordebitcreditcard;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

public class OTP extends AppCompatActivity {

    Button btnReset;
    TextView tvSet1,tvSet;
    ImageView imgBack;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_otp);
        init();
    }
    private void init() {
        imgBack = findViewById(R.id.imgBack);
        btnReset = findViewById(R.id.btnReset);
        tvSet1 = findViewById(R.id.tvSet1);
        tvSet = findViewById(R.id.tvSet);
        if(getIntent().getExtras() != null) {
            String op = getIntent().getExtras().getString("op");
            tvSet1.setText(op);
            String msg = getIntent().getExtras().getString("msg");
            tvSet.setText(msg);

        }
        imgBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(),Option2.class);
                startActivity(intent);
                finish();
            }
        });
        btnReset.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(getApplicationContext(),Option2.class);
                startActivity(intent);
                finish();

            }
        });
    }
}