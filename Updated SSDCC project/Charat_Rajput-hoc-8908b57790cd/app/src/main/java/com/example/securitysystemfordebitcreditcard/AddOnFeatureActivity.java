package com.example.securitysystemfordebitcreditcard;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.RelativeLayout;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.example.securitysystemfordebitcreditcard.adapters.AddOnFeatureAdapter;
import com.example.securitysystemfordebitcreditcard.listeners.ItemClickListener;
import com.example.securitysystemfordebitcreditcard.models.AddOnFeatureModel;

import java.util.ArrayList;

public class AddOnFeatureActivity extends AppCompatActivity implements ItemClickListener, View.OnClickListener {

    private int type;
    private static Animation shakeAnimation;
    boolean cardCheck, Card_Lost;
    private RecyclerView rvFeature;
    private RelativeLayout imgBack;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_on_feature);
        try {
            initViews();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void initViews() {
        type = getIntent().getIntExtra("type", -1);
        cardCheck = getIntent().getBooleanExtra("cardCheck", false);
        Card_Lost = getIntent().getBooleanExtra("Card_Lost", false);
        shakeAnimation = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.shake);
        imgBack = findViewById(R.id.imgBack);

        imgBack.setOnClickListener(this);
        ArrayList<AddOnFeatureModel> featureList = new ArrayList<>();
        if (type == -1)
            finish();
        else if (type == 0) {
            AddOnFeatureModel addOnFeatureModel = new AddOnFeatureModel();
            AddOnFeatureModel addOnFeatureModel1 = new AddOnFeatureModel();
            addOnFeatureModel.setFeatureName("Option 3 - If the user has lost or misplaced the card.");
            addOnFeatureModel.setOptionNumber("1.)");

            addOnFeatureModel1.setFeatureName("Option 4 - If the user has found his card.");
            addOnFeatureModel1.setOptionNumber("3.)");
            featureList.add(addOnFeatureModel);
            featureList.add(addOnFeatureModel1);

        } else if (type == 1) {
            AddOnFeatureModel addOnFeatureModel = new AddOnFeatureModel();
            AddOnFeatureModel addOnFeatureModel1 = new AddOnFeatureModel();
            AddOnFeatureModel addOnFeatureModel2 = new AddOnFeatureModel();
            AddOnFeatureModel addOnFeatureModel3 = new AddOnFeatureModel();
            AddOnFeatureModel addOnFeatureModel4 = new AddOnFeatureModel();

            addOnFeatureModel.setFeatureName("Option 7 - Provides one transaction either for ATM or shopping.");
            addOnFeatureModel.setOptionNumber("6.)");

            addOnFeatureModel1.setFeatureName("Option 8 - Provides one or several transaction for ATM only.");
            addOnFeatureModel1.setOptionNumber("7.)");


            addOnFeatureModel2.setFeatureName("Option 10 - Provides for one shopping transaction.");
            addOnFeatureModel2.setOptionNumber("8.)");


            addOnFeatureModel3.setFeatureName("Option 9 - Provides for multiple shopping transactions.");
            addOnFeatureModel3.setOptionNumber("9.)");


            addOnFeatureModel4.setFeatureName("Option 12 - Provides multiple transactions for ATM, shopping transaction with one pre-confirmation.");
            addOnFeatureModel4.setOptionNumber("10.)");

            featureList.add(addOnFeatureModel);
            featureList.add(addOnFeatureModel1);
            featureList.add(addOnFeatureModel2);
            featureList.add(addOnFeatureModel3);
            featureList.add(addOnFeatureModel4);

        } else if (type == 2) {
            AddOnFeatureModel addOnFeatureModel = new AddOnFeatureModel();
            addOnFeatureModel.setFeatureName("Option 5 - If the user wants to block the card.");
            addOnFeatureModel.setOptionNumber("2.)");
            featureList.add(addOnFeatureModel);

        } else if (type == 3) {
            AddOnFeatureModel addOnFeatureModel = new AddOnFeatureModel();
            addOnFeatureModel.setFeatureName("Option 1 - If the user wants to change password of the card.");
            addOnFeatureModel.setOptionNumber("4.)");
            featureList.add(addOnFeatureModel);
        } else if (type == 4) {
            AddOnFeatureModel addOnFeatureModel = new AddOnFeatureModel();
            addOnFeatureModel.setFeatureName("Option 11 - Provides for online transaction only.");
            addOnFeatureModel.setOptionNumber("5.)");
            featureList.add(addOnFeatureModel);
        } else if (type == 5) {
            AddOnFeatureModel addOnFeatureModel = new AddOnFeatureModel();
            addOnFeatureModel.setFeatureName("Option 2 - Provides card less transactions for ATM, merchant and online.");
            addOnFeatureModel.setOptionNumber("11.)");
            featureList.add(addOnFeatureModel);
        } else if (type == 6) {
            AddOnFeatureModel addOnFeatureModel = new AddOnFeatureModel();
            addOnFeatureModel.setFeatureName("Option 6 - If user wants to obtain OTP for every transaction.");
            addOnFeatureModel.setOptionNumber("12.)");
            featureList.add(addOnFeatureModel);
        }

        rvFeature = findViewById(R.id.rvAddOnFeature);
        LinearLayoutManager linearLayoutManager = new LinearLayoutManager(this);
        AddOnFeatureAdapter addOnFeatureAdapter = new AddOnFeatureAdapter(featureList, this);
        rvFeature.setLayoutManager(linearLayoutManager);
        rvFeature.setAdapter(addOnFeatureAdapter);
    }

    @Override
    public void onItemClicked(String tag, int position) {
        if (type == 0) {
            if (position == 0) {
                if (cardCheck) {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rvFeature.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), LostActivity.class);
                        startActivity(intent);
                    }

                }

            } else if (position == 1) {
                if (cardCheck) {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else if (Card_Lost) {
                    Intent intent = new Intent(getApplicationContext(), UnlockActivity.class);
                    startActivity(intent);
                } else {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card is already in the unlock mode", Toast.LENGTH_SHORT).show();

                }
            }
        } else if (type == 1) {
            if (position == 0) {
                if (cardCheck) {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rvFeature.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), OneTransactionActivity2.class);
                        startActivity(intent);
                    }

                }
            } else if (position == 1) {
                if (cardCheck) {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rvFeature.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), SeveralActivity.class);
                        startActivity(intent);
                    }

                }

            } else if (position == 2) {
                if (cardCheck) {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rvFeature.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), ShoppingActivity.class);
                        startActivity(intent);
                    }

                }


            } else if (position == 3) {
                if (cardCheck) {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rvFeature.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), MultipleShoppingActivity.class);
                        startActivity(intent);
                    }

                }

            } else if (position == 4) {
                if (cardCheck) {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

                } else {
                    if (Card_Lost) {
                        rvFeature.startAnimation(shakeAnimation);
                        Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                    } else {

                        Intent intent = new Intent(getApplicationContext(), MultipleActivity.class);
                        startActivity(intent);
                    }

                }
            }
        } else if (type == 2) {
            if (cardCheck) {
                rvFeature.startAnimation(shakeAnimation);
                Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

            } else {
                Intent intent = new Intent(getApplicationContext(), BlockActivity.class);
                startActivity(intent);
            }
        } else if (type == 3) {
            if (cardCheck) {
                rvFeature.startAnimation(shakeAnimation);
                Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

            } else {
                if (Card_Lost) {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                } else {
                    Intent intent = new Intent(getApplicationContext(), ChangePassActivity.class);
                    startActivity(intent);
                }
            }
        } else if (type == 4) {
            if (cardCheck) {
                rvFeature.startAnimation(shakeAnimation);
                Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

            } else {
                if (Card_Lost) {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                } else {

                    Intent intent = new Intent(getApplicationContext(), OnlineActivity.class);
                    startActivity(intent);
                }
            }
        } else if (type == 5) {
            if (cardCheck) {
                rvFeature.startAnimation(shakeAnimation);
                Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

            } else {
                if (Card_Lost) {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                } else {

                    Intent intent = new Intent(getApplicationContext(), CardLessActivity.class);
                    startActivity(intent);
                }

            }
        } else if (type == 6) {
            if (cardCheck) {
                rvFeature.startAnimation(shakeAnimation);
                Toast.makeText(getApplicationContext(), "Your card has been blocked permanently, contact your bank for re-issue of new card", Toast.LENGTH_SHORT).show();

            } else {
                if (Card_Lost) {
                    rvFeature.startAnimation(shakeAnimation);
                    Toast.makeText(getApplicationContext(), "Your card has been temporarily locked, please unlock your card", Toast.LENGTH_SHORT).show();

                } else {

                    Intent intent = new Intent(getApplicationContext(), OTPActivity.class);
                    startActivity(intent);
                }

            }
        }

    }


    @Override
    public boolean onSupportNavigateUp() {
        onBackPressed();
        return true;
    }

    @Override
    public void onClick(View v) {
        finish();
    }
}