package com.example.securitysystemfordebitcreditcard;

import android.annotation.TargetApi;
import android.content.Context;
import android.content.res.TypedArray;
import android.os.Build;
import android.util.AttributeSet;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.constraintlayout.widget.ConstraintLayout;

public class SquareConstraintLayout extends ConstraintLayout {
    private boolean isForHeight = false;

    public SquareConstraintLayout(@NonNull Context context) {
        super(context);
    }

    public SquareConstraintLayout(@NonNull Context context, @Nullable AttributeSet attrs) {
        super(context, attrs);
        setAttributes(attrs);
    }

    public SquareConstraintLayout(@NonNull Context context, @Nullable AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        setAttributes(attrs);
    }

    @TargetApi(Build.VERSION_CODES.LOLLIPOP)
    public SquareConstraintLayout(@NonNull Context context, @Nullable AttributeSet attrs, int defStyleAttr, int defStyleRes) {
        super(context, attrs, defStyleAttr, defStyleRes);
        setAttributes(attrs);
    }

    @Override
    protected void onMeasure(int widthMeasureSpec, int heightMeasureSpec) {
        if (!isForHeight)
            super.onMeasure(widthMeasureSpec, widthMeasureSpec);
        else
            super.onMeasure(heightMeasureSpec, heightMeasureSpec);
    }

    private void setAttributes(AttributeSet attrs) {
        TypedArray a = getContext().getTheme().obtainStyledAttributes(attrs, R.styleable.SquareConstraintLayout, 0, 0);
        try {
            isForHeight = a.getBoolean(R.styleable.SquareConstraintLayout_isForHeight, false);
        } finally {
            a.recycle();
        }

    }
}
