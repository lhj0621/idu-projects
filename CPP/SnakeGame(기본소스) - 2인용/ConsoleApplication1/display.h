#ifndef __SCREEN_H__
#define __SCREEN_H__
 
#include "common.h"
#include "snake.h"
 
class Display
{
public:
    Display();
 
    void print_wall();						//�� ���
    void print_food(Position pos);			//������ ��� �Լ�	
	void print_obstacle(Position pos);		//��ֹ� ��� �Լ�
    void print_snake(Snake snake);			//�� ��� �Լ�
    void print_prompt(const char *msg);		//�޽��� ���
    void clear();							//ȭ�� ����� �ϼ�
 
    const int max_x() const;				//ȭ�� �ִ� ���� ��ǥ
    const int max_y() const;				//ȭ�� �ִ� ���� ��ǥ
 
private:
    const int max_x_;						//������ ���� ��ǥ
    const int max_y_;						//������ ���� ��ǥ
};
 
#endif