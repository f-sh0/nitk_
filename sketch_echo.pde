import ddf.minim.*;
import ddf.minim.analysis.*;
import ddf.minim.effects.*;
import ddf.minim.signals.*;
import ddf.minim.spi.*;
import ddf.minim.ugens.*;

    
    //----------------------------------------------------------------------
    // バッファに入った一定量の入力音を受け取り、配列xに入れて何らかの加工を行い、出力するクラス。
    // 以下の関数を持つ。
    //
    //   - MyAudioSocket()　　　・・・　コンストラクタ
    //   - samples(float[] inX) ・・・　モノラルモードで録音しているときに定期的に呼び出される関数
    //   - samples(float[] sampL, float[] sampR) ・・・ステレオモードで録音しているときに定期的に呼び出される関数
    //   - uGenerate(float[] channels) 　　　　　 ・・・音を出力する際に定期的に呼び出される関数
    //
    class MyAudioSocket extends UGen implements AudioListener {
      private float[] x;    // 瞬時値群を入れる配列
      private int xNum;     // 配列xに入れた瞬時値の個数を入れる変数
      private int buffer_max;
      private int inpos, outpos;
      private int current;  // 現在までに処理した瞬時値の個数を入れる変数
      private float[] echoBuffer;
    
      //--------------------------------------------------------------------
      // コンストラクタ( new MyAudioSocket()したときに呼び出される初期設定用の関数　）
      //
      MyAudioSocket(int buffer_size) {
        int n_buffers = 4;
        buffer_max = n_buffers * buffer_size;
        x = new float[buffer_max];
        xNum = 0;
        inpos = outpos = 0;
        current = 0;
        //float delay_sec = 0.5;
        //int  delay_sample  =  (int)(delay_sec * 44100);
        echoBuffer = new float[buffer_size + delay_sample];
      }
    
      //--------------------------------------------------------------------
      // 入力がモノラルモードのとき、定期的に（バッファinXに瞬時値がたまったら）呼び出される関数
      //
      synchronized void samples(float[] inX) {
        if (effectNo == 0) {
          // 0のとき・・・エフェクト無し
          System.arraycopy(inX, 0, x, inpos, inX.length);  //inX[0]～inX[inX.length-1] を x[inpos]～x[inpos+inX.length-1]にコピーする
        } else if (effectNo == 1) {
          // 1のとき・・・エコーエフェクト
          for(int i=0; i<delay_sample; i++){
            echoBuffer[i] = echoBuffer[inX.length+i]; 
          }
          System.arraycopy(inX, 0, echoBuffer, delay_sample, inX.length);
          for (int i = 0; i < inX.length; i++){
            x[inpos + i] =  inX[i] + 0.5 * echoBuffer[i];
          }
        }
        inpos += inX.length;                // 次回入ってきた瞬時値群を格納する位置を更新する
        if (inpos == buffer_max) inpos = 0;
        xNum += inX.length;                 // 配列xに入っているデータ数を更新する
      }
    
      //--------------------------------------------------------------------
      // 入力がステレオモードのとき、定期的に（バッファsampLとsampRに瞬時値がたまったら）呼び出される関数
      //
      synchronized void samples(float[] sampL, float[] sampR) {
        println("error: このサンプルソースはモノラル専用です");
        exit();
      }
    
      //--------------------------------------------------------------------
      // 出力音の瞬時値1つを作るために定期的に呼び出される関数。
      // 出力したい瞬時値をバッファchannelsに入れる。
      protected void uGenerate(float[] channels) {
        if (xNum > 0) {
          // 加工した音を入れている配列xから瞬時値を1つ取り出し、再生用の配列channelsに入れる。
          // channels[0]の[0]はチャンネル番号。モノラルモード時は0だけを使う。
          channels[0] = x[outpos];
          outpos++;
          if (outpos == buffer_max) outpos = 0;
          xNum--;
        }
      }
    }
    
    
    //----------------------------------------------------------------------
    // 大域変数の宣言
    //
    Minim minim;
    AudioInput in;
    AudioOutput out;
    MyAudioSocket myEffect;
    int effectNo = 0;
    float delay_sec = 0.5;
    int  delay_sample  =  (int)(delay_sec * 44100);
    
    //----------------------------------------------------------------------
    // setup
    //
    void setup() {
      size(1000, 200);
    
      minim = new Minim(this);
      //minim.debugOn();
    
      int buffer_size = 4096;
      in = minim.getLineIn(Minim.MONO, buffer_size, 44100);     // マイク入力を設定する
      out = minim.getLineOut(Minim.MONO, buffer_size, 44100);   // スピーカ出力を設定する
    
      myEffect = new MyAudioSocket(buffer_size);
      in.addListener(myEffect);
      myEffect.patch(out);
    }
    
    //----------------------------------------------------------------------
    // draw
    //
    void draw() {
      background(0);
    
      // スピーカから出力する波形をlineで描く
      stroke(255);
      for (int i = 0; i < out.bufferSize() - 1; i++) {
        float x1  =  map( i, 0, out.bufferSize(), 0, width );
        float x2  =  map( i+1, 0, out.bufferSize(), 0, width );
        line( x1, height/2 + 2 * out.mix.get(i)*50, x2, height/2 + 2 * out.mix.get(i+1)*50);
      }
      
      // 現在のエフェクトの番号を表示する
      fill(0, 255, 0);
      textSize(30);
      text(effectNo, 50, 50);
    }
    
    //----------------------------------------------------------------------
    // keyPressed - キーを押したら呼び出される関数。今回はエフェクト番号を切り替えさせる。
    // 
    void keyPressed() {
      if (key == '0') {
        effectNo = 0;
      } else if (key == '1') {
        effectNo = 1;
      } else if (key == '2') {
        effectNo = 2;
      }
    }
