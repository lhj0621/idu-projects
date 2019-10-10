/**
@file main.cpp
*/
 
#include <iostream>
using namespace std;
 
#include <conio.h>
 
#include "common.h"
#include "snake_game.h"
 
int main()
{
    SnakeGame game;		//게임 진행을 담당하는 클래스
    ReturnCode ret;		//게임 상태를 표시하는 객체
 
    while (FOREVER)		//무한 루프
    {
        ret = game.start();			//첫 시작화면
        if (ret != RETURN_SUCCESS) //게임이 끝나면 종료
            return 1;
        ret = game.play();			//게임 진행
        if (ret == RETURN_NEWGAME)	//세 개임
            continue;
        else if (ret == RETURN_EXIT)//게임종료
            return 0;
        else if ((ret != RETURN_STOP) && (ret != RETURN_SUCCESS))
            return 1;
 
        game.stop();				//게임 오버
 
        break;
    }
 
    return 0;
}