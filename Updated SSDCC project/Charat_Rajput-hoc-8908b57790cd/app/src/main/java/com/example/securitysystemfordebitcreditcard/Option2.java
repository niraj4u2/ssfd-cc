package com.example.securitysystemfordebitcreditcard;

import static com.example.securitysystemfordebitcreditcard.LogInActivity.preferences;
import static com.example.securitysystemfordebitcreditcard.utils.AppUtils.RESULT_LOAD_IMAGE;
import static com.example.securitysystemfordebitcreditcard.utils.AppUtils.getInternalDirectoryName;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.content.FileProvider;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.NetworkResponse;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.Volley;
import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;
import com.example.securitysystemfordebitcreditcard.adapters.DashboardAdapter;
import com.example.securitysystemfordebitcreditcard.listeners.ItemClickListener;
import com.example.securitysystemfordebitcreditcard.utils.AppUtils;
import com.example.securitysystemfordebitcreditcard.utils.CheckInternet;
import com.example.securitysystemfordebitcreditcard.webservice.ApiCall;
import com.jackandphantom.circularimageview.CircleImage;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.File;
import java.io.FileOutputStream;
import java.io.InputStream;
import java.io.OutputStream;
import java.util.ArrayList;
import java.util.HashMap;

public class Option2 extends AppCompatActivity implements ItemClickListener, View.OnClickListener, Response.Listener<NetworkResponse>,Response.ErrorListener {
    //    LinearLayout ll1, ll2, ll3, ll4, ll5, ll6, ll7, ll8, ll9, ll10, ll11, ll12;
    ImageView btnLogout;
    RelativeLayout rl;
    RequestQueue requestQueue;
    private static Animation shakeAnimation;
    ProgressDialog progressDialog;
    ProgressDialog progressUploadDialog;
    boolean cardCheck, Card_Lost;
    String account;
    String imgUrl;
    SharedPreferences sharedPreferences;
    private final ArrayList<String> featureNames = new ArrayList<>();
    private String userName;
    private TextView txtUser;
    private CircleImage ivUser;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_option2);
        requestQueue = Volley.newRequestQueue(getApplicationContext());

        init();
        sharedPreferences = getSharedPreferences(preferences, this.MODE_PRIVATE);

        cardCheck = sharedPreferences.getBoolean("Card_Block", false);
        Card_Lost = sharedPreferences.getBoolean("Card_Lost", false);
        userName = sharedPreferences.getString("userName", "");
        account = sharedPreferences.getString("account", "");
        imgUrl = sharedPreferences.getString("profile_img", "");
        if(!imgUrl.isEmpty()) {
            RequestOptions options = new RequestOptions()
                    .centerCrop()
                    .placeholder(R.drawable.user_icon)
                    .error(R.drawable.user_icon);

            Glide.with(this).load(imgUrl).apply(options).into(ivUser);
        }

        if (!userName.isEmpty()) {
            txtUser.setText("Welcome, " + userName);
        }


        btnLogout.setOnClickListener(v -> {
            AppUtils.createLogoutDialog(Option2.this);


        });
        /*ll1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), ChangePassActivity.class);
                        startActivity(intent);
                    }

                }

            }
        });

        ll2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), LostActivity.class);
                        startActivity(intent);
                    }

                }

            }
        });

        ll3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    Intent intent = new Intent(getApplicationContext(), BlockActivity.class);
                    startActivity(intent);
                }


            }
        });
        ll4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else if (Card_Lost) {
                    Intent intent = new Intent(getApplicationContext(), UnlockActivity.class);
                    startActivity(intent);
                } else {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card is already in the unlock mode", Toast.LENGTH_SHORT).show();

                }

            }
        });
        ll5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), OneTransactionActivity2.class);
                        startActivity(intent);
                    }

                }
            }
        });
        ll6.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), SeveralActivity.class);
                        startActivity(intent);
                    }

                }
            }
        });
        ll7.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), ShoppingActivity.class);
                        startActivity(intent);
                    }

                }


            }
        });
        ll8.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), MultipleActivity.class);
                        startActivity(intent);
                    }

                }
            }
        });
        ll9.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), OTPActivity.class);
                        startActivity(intent);
                    }

                }

            }
        });
        ll10.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), CardLessActivity.class);
                        startActivity(intent);
                    }

                }

            }
        });
        ll11.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {


                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), OnlineActivity.class);
                        startActivity(intent);
                    }
                }
            }
        });
        ll12.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), MultipleShoppingActivity.class);
                        startActivity(intent);
                    }

                }
            }
        });*/
    }

    @Override
    public void onResume() {
        super.onResume();

        String check = sharedPreferences.getString("pin", "");
       checkUserAuthentication(check, account);
    }


    private void init() {

        RecyclerView rvFeatures = findViewById(R.id.rvFeatures);
        txtUser = findViewById(R.id.txtUser);
        ivUser = findViewById(R.id.ivUser);

        featureNames.add("Card ON/OFF");
        featureNames.add("Card Block");
        featureNames.add("Set Card Pin");
        featureNames.add("For Online Transaction");
        featureNames.add("Manage Card");
        featureNames.add("Card-Less Cash");
        featureNames.add("Get OTP");

        DashboardAdapter dashboardAdapter = new DashboardAdapter(featureNames, this);
        GridLayoutManager gridLayoutManager = new GridLayoutManager(this, 3);
        rvFeatures.setLayoutManager(gridLayoutManager);
        rvFeatures.setAdapter(dashboardAdapter);

       /* ll1 = findViewById(R.id.ll1);
        ll2 = findViewById(R.id.ll2);
        ll3 = findViewById(R.id.ll3);
        ll4 = findViewById(R.id.ll4);
        ll5 = findViewById(R.id.ll5);
        ll6 = findViewById(R.id.ll6);
        ll7 = findViewById(R.id.ll7);
        ll8 = findViewById(R.id.ll8);
        ll9 = findViewById(R.id.ll9);
        ll10 = findViewById(R.id.ll10);
        ll11 = findViewById(R.id.ll11);
        ll12 = findViewById(R.id.ll12);*/
        rl = findViewById(R.id.rl);
        btnLogout = findViewById(R.id.btnLogout);
        ivUser.setOnClickListener(this);
        shakeAnimation = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.shake);

    }


    public void checkUserAuthentication(String pin, String account) {

        if (!CheckInternet.isConnectedNetwork(Option2.this)) {
            Toast.makeText(Option2.this, "Please connect to internet", Toast.LENGTH_SHORT).show();
            return;
        }
        progressDialog = new ProgressDialog(this);
        progressDialog.show();
        progressDialog.setContentView(R.layout.new_progress);
        progressDialog.getWindow().setBackgroundDrawableResource(android.R.color.transparent);


        ApiCall apiCall = new ApiCall();
        HashMap<String, String> params = new HashMap<>();
        params.put("pin", pin);
        params.put("account_num", account);
        apiCall.callApi(Option2.this, ApiData.mpinExist, Request.Method.POST, params, response -> {
            try {
                progressDialog.dismiss();

                if (response.get("status").equals(true)) {
                    JSONObject dataObject = response.optJSONObject("data");
                    assert dataObject != null;
                    String cardStatus = dataObject.optString("card_status");
                    boolean cardLockStatus = false;
                    boolean cardBlockStatus = false;
                    if (!cardStatus.isEmpty()) {
                        switch (cardStatus) {
                            case "0":
                                cardBlockStatus = true;
                                break;
                            case "2":
                                cardLockStatus = true;
                                break;
                        }
                    }
                    SharedPreferences.Editor editor = sharedPreferences.edit();
                    editor.putBoolean("Card_Block", cardBlockStatus);
                    editor.putBoolean("Card_Lost", cardLockStatus);
                    editor.apply();
                    editor.commit();
                    cardCheck = cardBlockStatus;
                    Card_Lost = cardLockStatus;

                } else {

                    Intent intent = new Intent(getApplicationContext(), LogInActivity.class);
                    startActivity(intent);
                    finish();
                    Toast.makeText(getApplicationContext(), "User Not Exists", Toast.LENGTH_LONG).show();


                }
            } catch (JSONException e) {
                e.printStackTrace();
            }

        }, error -> {
            progressDialog.dismiss();
            showToast(error.getMessage(), Toast.LENGTH_SHORT);
//            Toast.makeText(Option2.this, error.getMessage(), Toast.LENGTH_SHORT).show();
        });


    }


    @Override
    public void onItemClicked(String tag, int position) {
        if (tag.equalsIgnoreCase("rv")) {
            if (position == 1) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    showToast("Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT);

                } else {
                    Intent intent = new Intent(getApplicationContext(), AddOnFeatureActivity.class);
                    intent.putExtra("type", 2);
                    intent.putExtra("cardCheck", cardCheck);
                    intent.putExtra("Card_Lost", Card_Lost);
                    startActivity(intent);
                }

            } else if (position == 2) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    showToast("Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT);
//                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        showToast("Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT);
//                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {
                        Intent intent = new Intent(getApplicationContext(), AddOnFeatureActivity.class);
                        intent.putExtra("type", 3);
                        intent.putExtra("cardCheck", cardCheck);
                        intent.putExtra("Card_Lost", Card_Lost);
                        startActivity(intent);


                    }

                }

            } else if (position == 3) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    showToast("Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT);
//                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        showToast("Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT);
//                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {
                        Intent intent = new Intent(getApplicationContext(), AddOnFeatureActivity.class);
                        intent.putExtra("type", 4);
                        intent.putExtra("cardCheck", cardCheck);
                        intent.putExtra("Card_Lost", Card_Lost);
                        startActivity(intent);
                    }
                }
            } else if (position == 5) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    showToast("Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT);
//                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        showToast("Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT);
//                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), AddOnFeatureActivity.class);
                        intent.putExtra("type", 5);
                        intent.putExtra("cardCheck", cardCheck);
                        intent.putExtra("Card_Lost", Card_Lost);
                        startActivity(intent);
                    }

                }
            } else if (position == 6) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    showToast("Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT);
//                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        showToast("Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT);
//                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), AddOnFeatureActivity.class);
                        intent.putExtra("type", 6);
                        intent.putExtra("cardCheck", cardCheck);
                        intent.putExtra("Card_Lost", Card_Lost);
                        startActivity(intent);
                    }

                }
            } else if (position == 0) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    showToast("Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT);
//                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    Intent intent = new Intent(getApplicationContext(), AddOnFeatureActivity.class);
                    intent.putExtra("type", 0);
                    intent.putExtra("cardCheck", cardCheck);
                    intent.putExtra("Card_Lost", Card_Lost);
                    startActivity(intent);
                }

            } else if (position == 4) {
                if (cardCheck) {
                    rl.startAnimation(shakeAnimation);
                    showToast("Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT);
//                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rl.startAnimation(shakeAnimation);
                        showToast("Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT);
//                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), AddOnFeatureActivity.class);
                        intent.putExtra("type", 1);
                        intent.putExtra("cardCheck", cardCheck);
                        intent.putExtra("Card_Lost", Card_Lost);
                        startActivity(intent);
                    }

                }

            }
        }
    }

    private void showToast(String message, int duration) {
        Toast toast = Toast.makeText(getApplicationContext(), message, duration);
        toast.show();
    }

    @Override
    public void onClick(View view) {
        if (view == ivUser) {
            AppUtils.createImageDialog(Option2.this);
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (resultCode == RESULT_OK /*&& null != data*/) {
            if (requestCode == RESULT_LOAD_IMAGE) {
                Uri selectedImage = data.getData();
                Glide.with(Option2.this).load(selectedImage).into(ivUser);
                try {
                    InputStream in = getContentResolver().openInputStream(selectedImage);
                    OutputStream out = new FileOutputStream(new File(getInternalDirectoryName(this), "user.jpg"));
                    byte[] buf = new byte[1024];
                    int len;
                    while ((len = in.read(buf)) > 0) {
                        out.write(buf, 0, len);
                    }
                    out.close();
                    in.close();

                    File file = new File(getInternalDirectoryName(this), "user.jpg");
                    uploadImage(file);
                } catch (Exception e) {
                    e.printStackTrace();
                }
//            ivUser.setImageBitmap(BitmapFactory.decodeFile(picturePath));
            } else {
                File file = new File(getInternalDirectoryName(this), "user.jpg");
                Uri uri = FileProvider.getUriForFile(this, this.getApplicationContext().getPackageName() + ".provider", file);
                Glide.with(Option2.this).load(uri).into(ivUser);
                uploadImage(file);

            }
        }
    }

    private void uploadImage(File file) {
        progressUploadDialog = new ProgressDialog(this);
        progressUploadDialog.show();
        progressUploadDialog.setContentView(R.layout.progress_upload);
        progressUploadDialog.getWindow().setBackgroundDrawableResource(android.R.color.transparent);

        HashMap<String, String> params = new HashMap<>();
        params.put("account_num", account);
        ApiCall apiCall = new ApiCall();
        apiCall.callImageUploadApi(Option2.this,ApiData.imageUpload,file,Request.Method.POST,params,this,this);
    }

    @Override
    public void onErrorResponse(VolleyError error) {
        progressUploadDialog.dismiss();
        Toast.makeText(this,"Unable to update profile image to server please try later.",Toast.LENGTH_LONG).show();
    }

    @Override
    public void onResponse(NetworkResponse response) {
//        Toast.makeText(this,"success"+response,Toast.LENGTH_LONG).show();
        try {
            progressUploadDialog.dismiss();
            JSONObject obj = new JSONObject(new String(response.data));
            boolean isUploaded=obj.optBoolean("success");
            if(isUploaded) {
                Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_SHORT).show();
                JSONObject dataObject=obj.optJSONObject("data");
                if(dataObject!=null) {
                    String profileImageUrl = dataObject.optString("profile_img");
                    SharedPreferences.Editor editor = sharedPreferences.edit();
                    editor.putString("profile_img", profileImageUrl);
                    editor.apply();
                    editor.commit();
                }
            }else{
                Toast.makeText(this,"Unable to update profile image to server please try later.",Toast.LENGTH_LONG).show();

            }
        } catch (JSONException e) {
            e.printStackTrace();
        }

    }
}


