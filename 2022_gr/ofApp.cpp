#include "ofApp.h"

//--------------------------------------------------------------
void ofApp::setup(){
    
    ofBackground(0);
    ofEnableDepthTest();
    cam.setDistance(100);
    
    w = 200;
    h = 200;
    
    for(int i=0; i<w; i++){
        for(int j=0; j<h; j++){
            mesh.addColor(ofFloatColor(0.1,0.2,0.3));
        }
    }
}

//--------------------------------------------------------------
void ofApp::update(){
    mesh.clearVertices();
    
    for(int i=0; i<w; i++){
        for(int j=0; j<h; j++){
            float x = sin(i*0.1+ofGetElapsedTimef())*10.0;
            float y = sin(j*0.15+ofGetElapsedTimef())*10.0;
            float z = x+y;
            mesh.addVertex(ofVec3f(i-w/2, j-h/2, z));
        }
    }
}

//--------------------------------------------------------------
void ofApp::draw(){
    
    ofSetHexColor(0xffffff);
    cam.begin();
    
    glPointSize(4.0);
    glEnable(GL_POINT_SMOOTH);
    mesh.drawVertices();
    
    cam.end();
    
    string info;
    info = "Vertex num = " + ofToString(w*h,0) + "\n";
    info += "FPS = " + ofToString(ofGetFrameRate(),2);
    ofDrawBitmapString(info, 30, 30);
    
}

//--------------------------------------------------------------
void ofApp::keyPressed(int key){

}

//--------------------------------------------------------------
void ofApp::keyReleased(int key){

}

//--------------------------------------------------------------
void ofApp::mouseMoved(int x, int y ){

}

//--------------------------------------------------------------
void ofApp::mouseDragged(int x, int y, int button){

}

//--------------------------------------------------------------
void ofApp::mousePressed(int x, int y, int button){

}

//--------------------------------------------------------------
void ofApp::mouseReleased(int x, int y, int button){

}

//--------------------------------------------------------------
void ofApp::mouseEntered(int x, int y){

}

//--------------------------------------------------------------
void ofApp::mouseExited(int x, int y){

}

//--------------------------------------------------------------
void ofApp::windowResized(int w, int h){

}

//--------------------------------------------------------------
void ofApp::gotMessage(ofMessage msg){

}

//--------------------------------------------------------------
void ofApp::dragEvent(ofDragInfo dragInfo){ 

}
