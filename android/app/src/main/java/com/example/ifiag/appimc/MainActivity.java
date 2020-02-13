package com.example.ifiag.appimc;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
    TextView tinter, tmal;
    EditText edtaille, edpoids;
    ImageView imgimc;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        edtaille= (EditText) findViewById(R.id.edtaille);
        edpoids = (EditText) findViewById(R.id.edpoids);
        tinter =(TextView) findViewById(R.id.tinterpretaion);
        tmal =(TextView) findViewById(R.id.tmaladie);
        imgimc = (ImageView) findViewById(R.id.imageimc);
    }

    public void valider(View v) {

        try{

         double taille =Double.parseDouble( edtaille.getText().toString());
         double poids=Double.parseDouble(edpoids.getText().toString());

double imc=poids/Math.pow(taille,2);
          if (imc<15){
              imgimc.setImageResource(R.mipmap.famine);
              tinter.setText("Famine");
              tmal.setText("Risques extremement élevés");
          }else  if (imc<18.5  ){
              imgimc.setImageResource(R.mipmap.maigre);
              tinter.setText("Maigreur");
              tmal.setText("Accrus");
          }else  if (imc<25  ){
              imgimc.setImageResource(R.mipmap.corp_normal);
              tinter.setText("Corpulence normale");
              tmal.setText("Faible");
          }else {
              imgimc.setImageResource(R.mipmap.obese);
              tinter.setText("Surpoids");
              tmal.setText("Acrus");
          }


        }catch (Exception e){
            Toast.makeText(this, "erreur ....", Toast.LENGTH_SHORT).show();
        }
    }
}
