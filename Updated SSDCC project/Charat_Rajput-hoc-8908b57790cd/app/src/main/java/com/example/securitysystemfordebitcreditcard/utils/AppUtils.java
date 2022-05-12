package com.example.securitysystemfordebitcreditcard.utils;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.provider.MediaStore;

import androidx.core.app.ActivityCompat;
import androidx.core.content.FileProvider;

import com.example.securitysystemfordebitcreditcard.LogInActivity;
import com.example.securitysystemfordebitcreditcard.R;

import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;

public class AppUtils {
    public static final int RESULT_LOAD_IMAGE = 27;
    public static final int RESULT_CAPTURE_IMAGE = 28;

    public static void createLogoutDialog(Activity activity) {

        new AlertDialog.Builder(activity)
                .setTitle("Confirmation")
                .setMessage("Do you want to Log Out?")

                .setPositiveButton(activity.getResources().getString(R.string.Yes), (dialog, which) -> {
                    Intent intent = new Intent(activity, LogInActivity.class);
                    activity.startActivity(intent);
                    ActivityCompat.finishAffinity(activity);
                })

                .setNegativeButton(activity.getResources().getString(R.string.No), null)
                .show();
    }

    public static void createImageDialog(Activity activity) {
        new AlertDialog.Builder(activity)
                .setTitle("Choose 1")
                .setMessage("Please select one of the options below.")

                .setPositiveButton(activity.getResources().getString(R.string.Camera), (dialog, which) -> {
                    Intent takePicture = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                    File file = new File(getInternalDirectoryName(activity), "user.jpg");
                    Uri uri = FileProvider.getUriForFile(activity, activity.getApplicationContext().getPackageName() + ".provider", file);
//                    Uri uri=Uri.fromFile(file);
                    takePicture.putExtra(android.provider.MediaStore.EXTRA_OUTPUT, uri);
                    activity.startActivityForResult(takePicture, RESULT_CAPTURE_IMAGE);
                })

                .setNegativeButton(activity.getResources().getString(R.string.Gallery), (dialogInterface, in) -> {
                    Intent i = new Intent(
                            Intent.ACTION_PICK,
                            android.provider.MediaStore.Images.Media.EXTERNAL_CONTENT_URI);
                    activity.startActivityForResult(i, RESULT_LOAD_IMAGE);
                })
                .show();
    }

    public static String getInternalDirectoryName(Context context) {

        String app_folder_path;

        app_folder_path = context.getFilesDir().toString() + "/UserImages";
        File dir = new File(app_folder_path);
        if (!dir.exists() && !dir.mkdirs()) {
            return null;
        }

        return app_folder_path;
    }

    public static byte[] getFileData(File file) {

        // Creating an object of FileInputStream to
        // read from a file
        try {
            FileInputStream fl = new FileInputStream(file);

            // Now creating byte array of same length as file
            byte[] arr = new byte[(int) file.length()];

            // Reading file content to byte array
            // using standard read() method
            fl.read(arr);

            // lastly closing an instance of file input stream
            // to avoid memory leakage
            fl.close();

            // Returning above byte array
            return arr;
        } catch (Exception e) {
            e.printStackTrace();
        }
        return new byte[(int)0];
    }
}
