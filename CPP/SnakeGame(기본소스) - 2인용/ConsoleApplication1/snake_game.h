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
 
    void initialize();  //�ʱ�ȭ
 
    ReturnCode start(); //ó��ȭ��
    ReturnCode play();  //���ӽ���
    ReturnCode stop();  //��������

    void make_food();    //������ ����
	void make_obstacle();//��ֹ� ����
	bool CollisionCheck();
 
private:
    ReturnCode pause();
    bool is_valid_snake_position(int x, int y); //���� ��ġ�� ������ ��ġ�� ��ġ���� üũ
    bool is_no_food();							//ȭ�鿡 �������� �ִ��� üũ 
    const ScoreType score() const;
 
private:
    Snake snake_1;
	Snake snake_2;
    Position food_position_;
    Display display_;
    ScoreType score_;
	int obstacleCount;				//��ֹ���
	Position obstacle_position_[10];//��ֹ� ���� �迭
};
 
#endif