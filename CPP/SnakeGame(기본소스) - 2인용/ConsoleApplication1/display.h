#ifndef __SCREEN_H__
#define __SCREEN_H__
 
#include "common.h"
#include "snake.h"
 
class Display
{
public:
    Display();
 
    void print_wall();						//벽 출력
    void print_food(Position pos);			//아이템 출력 함수	
	void print_obstacle(Position pos);		//장애물 출력 함수
    void print_snake(Snake snake);			//뱀 출력 함수
    void print_prompt(const char *msg);		//메시지 출력
    void clear();							//화면 지우기 하숨
 
    const int max_x() const;				//화면 최대 가로 좌표
    const int max_y() const;				//화면 최대 가로 좌표
 
private:
    const int max_x_;						//게임판 가로 좌표
    const int max_y_;						//게임판 세로 좌표
};
 
#endif