#ifndef __SNAKE_GAME_H__
#define __SNAKE_GAME_H__
 
#include "common.h"
#include "display.h"
#include "snake.h"
 
class SnakeGame
{
    typedef unsigned int ScoreType;
 
public:
    SnakeGame();
 
    void initialize();  //초기화
 
    ReturnCode start(); //처음화면
    ReturnCode play();  //게임실행
    ReturnCode stop();  //게임종료

    void make_food();    //아이템 생성
	void make_obstacle();//장애물 생성
	bool CollisionCheck();
 
private:
    ReturnCode pause();
    bool is_valid_snake_position(int x, int y); //뱀의 위치와 아이템 위치가 겹치는지 체크
    bool is_no_food();							//화면에 아이템이 있는지 체크 
    const ScoreType score() const;
 
private:
    Snake snake_1;
	Snake snake_2;
    Position food_position_;
    Display display_;
    ScoreType score_;
	int obstacleCount;				//장애물수
	Position obstacle_position_[10];//장애물 저장 배열
};
 
#endif