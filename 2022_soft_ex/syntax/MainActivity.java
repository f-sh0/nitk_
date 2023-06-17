package com.example.calclator;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

import java.util.Stack;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {

    List<String> equation = new ArrayList<String>();
    List<String> rpn = new ArrayList<String>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        String[] labels =
                {
                        "bt_0","bt_1","bt_2","bt_3","bt_4","bt_5","bt_6","bt_7","bt_8","bt_9",
                        "bt_addition", "bt_subtraction", "bt_division", "bt_multiplication",
                        "bt_dot","bt_c","bt_equal", "bt_par_left", "bt_par_right"
                };
        Button[] bt= new Button[labels.length];

        for (int i = 0; i < bt.length; i++){
            bt[i] = findViewById(getResources().getIdentifier(labels[i], "id", getPackageName()));
            bt[i].setOnClickListener(this);
        }
    }

    @Override
    public void onClick(View v) {

        TextView display = findViewById(R.id.display);
        String displayText = display.getText().toString();
        String bt = ((Button) v).getText().toString();

        int id = v.getId();
        Double ans;
        System.out.println(displayText);

        if(id == R.id.bt_equal){
            equation = splitEquation(displayText);
            System.out.println(equation);

            try {
                rpn = convertRPN(equation);
                ans = calculation(rpn);
                System.out.println("main" + ans);
                display.setText(normalize(ans));
            }catch (Exception e){
                display.setText("Error");
            }


        }else if(id == R.id.bt_c){
            display.setText("0");
        }else{
            if (displayText.equals("0") && !(id == R.id.bt_dot))
                displayText = "";

            display.setText(displayText + bt);
        }


    }

    // split text
    public List splitEquation(String eq){
        String[] operator =  {"−", "+", "÷", "×"};
        String separator = "_"; //""[^0-9 | ^.]";w

        for(int i = 0; i < operator.length ; i++)
            eq = eq.replace(operator[i], "_"+operator[i]+"_");

        System.out.println(eq);

        eq = eq.replace("(", "(_").replace(")", "_)");

        return Arrays.asList(eq.split(separator));
    }

    public List convertRPN(List<String> equation){
        Stack<String> stack = new Stack<String>();
        List<String> converted = new ArrayList<String>();

        for(String token: equation) {
            while (true) {
//                System.out.println("TOKEN: "+token + " , STACK :" + stack);

                if (stack.empty()) {
                    break;
                } else if (isHighPriority(token, stack.peek()) || stack.peek().equals("(")) {
                    break;
                } else {
                    converted.add(stack.pop());
                }
            }

            if (!token.equals(")"))
                stack.push(token);
            else
                stack.pop();
        }

        while(!stack.empty())
            converted.add(stack.pop());

//        System.out.println("before" + equation);
//        System.out.println("after" + converted);

        return converted;
    }

    public boolean isHighPriority(String target, String comparison ){
        System.out.println(target + ": " + priority(target) + " ," + comparison + ": " + priority(comparison));

        if(priority(target) > priority(comparison))
            return true;
        else
            return false;
    }

    public int priority(String token){
        switch (token) {
            case "(":
                return 5;
            case "×":
            case "÷":
                return 3;
            case "−":
            case "+":
                return 2;
            case ")":
                return 1;
            default:
                return 4;
        }
    }

    public double element(String a, String b, String operator){

        double x = Double.parseDouble(a);
        double y = Double.parseDouble(b);

        switch (operator) {
            case "×":
                return x * y;
            case "÷":
                return x / y;
            case "−":
                return x - y;
            case "+":
                return x + y;
        }

        return 0;
    }

    public double calculation(List<String> rpn){

        String a, b, token;

        while(rpn.size() > 1) {
            System.out.println(rpn);
            for (int i = 0; i < rpn.size(); i++){
                token = rpn.get(i);

                if (token.equals("−") || token.equals("+") || token.equals("÷") || token.equals("×")) {
                    a = rpn.get(i - 2);
                    b = rpn.get(i - 1);

                    rpn.remove(i);
                    rpn.remove(i-1);

                    rpn.set(i-2 , element(a, b, token) + "");
                    break;
                }
            }
        }

        return Double.parseDouble(rpn.get(0));
    }

    private static String normalize(double num){
        if(num == (int) num)
            return String.valueOf( (int) num);
        else
            return String.valueOf(num);
    }

}