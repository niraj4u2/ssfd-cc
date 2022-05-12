package com.example.securitysystemfordebitcreditcard;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import java.util.Random;

public class ChangePassActivity1 extends AppCompatActivity {
    Button btnReset;
    TextView tvSet1,tvSet,tvUnique;
    RelativeLayout rl1;
    ImageView imgBack;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_change_pass1);

        init();

    }

    private void init() {
        imgBack = findViewById(R.id.imgBack);
        btnReset = findViewById(R.id.btnReset);
        tvSet1 = findViewById(R.id.tvSet1);
        tvSet = findViewById(R.id.tvSet);
        tvUnique = findViewById(R.id.tvUnique);
        rl1 = findViewById(R.id.rl1);
        if(getIntent().getExtras() != null) {
            String op = getIntent().getExtras().getString("op");
            tvSet1.setText(op);
            String msg = getIntent().getExtras().getString("msg");
            tvSet.setText(msg);

            if(op.equalsIgnoreCase("Option 2.")){
                Random rand1 = new Random();
                String COS = String.format("%04d", rand1.nextInt(10000));
                tvUnique.setText(COS);
                rl1.setVisibility(View.VISIBLE);
            }else{
                rl1.setVisibility(View.GONE);

            }

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