package com.example.calclator

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.TextView

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

//変数の宣言

        //数値を保持する変数の宣言
        var value : Int = 0

        //AC（All Clear）のフラグ
        var ac : Boolean = false

        //演算子を押した後に数字を押すなど計算を行うかを判断するフラグ
        var calc : Boolean = false

        //実行予定の演算子を保持しておく変数
        var operator : String = "no"    //演算子を未選択状態

        //ボタンの宣言
        val btnZero : Button = findViewById(R.id.zero)
        val btnOne  : Button = findViewById(R.id.one)
        val btnTwo  : Button = findViewById(R.id.two)
        val btnThree: Button = findViewById(R.id.three)
        val btnFour : Button = findViewById(R.id.four)
        val btnFive : Button = findViewById(R.id.five)
        val btnSix  : Button = findViewById(R.id.six)
        val btnSeven: Button = findViewById(R.id.seven)
        val btnEight: Button = findViewById(R.id.eight)
        val btnNine : Button = findViewById(R.id.nine)
        val btnAdd  : Button = findViewById(R.id.add)   // +
        val btnMul  : Button = findViewById(R.id.mul)   // -
        val btnSub  : Button = findViewById(R.id.sub)   // ×
        val btnDiv  : Button = findViewById(R.id.div)   // ÷
        val btnEqual:Button = findViewById(R.id.equal)  // =
        val btnAc : Button = findViewById(R.id.ac)      // AC

        //計算結果の表示
        val resultView : TextView = findViewById(R.id.result)


//関数の宣言

        //数字ボタンを押した時の関数
        fun numBtnAction(num : String) {
            resultView.text = if(resultView.text.toString() != "0" && ac == false){
                resultView.text.toString() + num
            } else {
                ac = false
                num
            }
            calc = true
        }

        //計算を実行する際の演算子を確認する
        fun calculation(op : String) :Int {
            return if (op == "+") {
                value + resultView.text.toString().toInt()
            } else if (op == "-") {
                value - resultView.text.toString().toInt()
            } else if (op == "*") {
                value * resultView.text.toString().toInt()
            } else if (op == "/") {
                value / resultView.text.toString().toInt()
            } else {
                resultView.text.toString().toInt()
            }
        }

        //計算の行う時の処理
        fun calcBtnAction(op : String) {
            if (calc) {     //calc == true
                value = calculation(operator)
                ac = true
                calc = false
                resultView.text = value.toString()
            }
            operator = op
        }

        //イコールボタンを押した時の関数
        fun equalBtnAction() {
            if (calc) {     //calc == true
                value = calculation(operator)
                calc = false
                ac = true
                resultView.text = value.toString()
                operator = "no"         //演算子を未選択
            }
        }

        //ACを押した時の関数
        fun acBtnAction(){
            resultView.text ="0"
            value = 0
            operator = "no"             //演算子を未選択
            ac = false
            calc = false
        }

//ボタンが押されたことを検知する処理

        //0
        btnZero.setOnClickListener {
            numBtnAction("0");
        }

        //1
        btnOne.setOnClickListener {
            numBtnAction("1");
        }

        //2
        btnTwo.setOnClickListener {
            numBtnAction("2");
        }

        //3
        btnThree.setOnClickListener {
            numBtnAction("3");
        }

        //4
        btnFour.setOnClickListener {
            numBtnAction("4");
        }

        //5
        btnFive.setOnClickListener {
            numBtnAction("5");
        }

        //6
        btnSix.setOnClickListener {
            numBtnAction("6");
        }

        //7
        btnSeven.setOnClickListener {
            numBtnAction("7");
        }

        //8
        btnEight.setOnClickListener {
            numBtnAction("8");
        }

        //9
        btnNine.setOnClickListener {
            numBtnAction("9");
        }

        //+
        btnAdd.setOnClickListener {
            calcBtnAction("+")
        }

        //-
        btnSub.setOnClickListener {
            calcBtnAction("-")
        }

        //×
        btnMul.setOnClickListener {
            calcBtnAction("*")
        }

        //÷
        btnDiv.setOnClickListener {
            calcBtnAction("/")
        }

        //=
        btnEqual.setOnClickListener {
            equalBtnAction()
        }

        //AC
        btnAc.setOnClickListener {
            acBtnAction()
        }
    }
}