#include <cstdlib>
#include <ctime>
#include <conio.h>
#include<iostream>
#include "snake_game.h"
using std::cout;
// ������()
//
SnakeGame::SnakeGame()
{
    initialize();
}

 
// initialize()
// ... ���� ��ġ�� ������ �ʱ�ȭ�Ѵ�.
//
void SnakeGame::initialize()
{
    food_position_.X = 0; 
    food_position_.Y = 0;  //�������� ��ġ �ʱ�ȭ
	obstacleCount = 0; //��ֹ� ���� �ʱ�ȭ
    score_ = 0;  //���� �ʱ�ȭ
}
 
// start()
// ... ���� �÷��� �� ���������� ó���Ѵ�.
//
ReturnCode SnakeGame::start()
{
    this->initialize();     // ������ ������ġ�� �ʱ�ȭ�Ѵ�.
    snake_1.initialize();    // ���� ���� �� ��ġ�� �ʱ�ȭ�Ѵ�.
	snake_2.initialize();    // ���� ���� �� ��ġ�� �ʱ�ȭ�Ѵ�.

 
    display_.clear(); //ȭ�� �����
  //  display_.print_prompt("Do you want to play? (y/n) ");  //���� ���� ���� Ȯ��


	for (int tcount = 0;; tcount++) { //Ű�� �Է��ϸ� ���ѷ��� ����.
		if (kbhit()) break;
		if (tcount % 10 == 0) {
			Color(tcount %9+1);
			putchar_at_xy(24,11, "�� Do you want to play? (Y/N) ��\n ");  //puts�����ϱ� ������� �߰����ֽð� gotoxy()�� �� �ְ�
			putchar_at_xy(14, 3, "  ����   ��      ��      ��      ��    ��  �����");
			putchar_at_xy(14, 4, "��         ���    ��    ��  ��    ��  ��    ��");
			Color(tcount%9+1);
			Sleep(200);
			putchar_at_xy(14, 5, "  ����   ��  ��  ��   �����   ���      �����");
			putchar_at_xy(14, 6, "        �� ��    ���  ��      ��  ��  ��    ��");
			Color(tcount %9+1);
			Sleep(200);
			putchar_at_xy(14, 7, "  ����   ��      �� ��        �� ��    ��  �����");

			putchar_at_xy(19, 15, "  ����        ��       ��      ��  �����");
			Color(tcount %9+1);
			Sleep(200);
			putchar_at_xy(19, 16, "��            ��  ��     ���  ���  ��");
			putchar_at_xy(19, 17, "��    ���   �����    ��  ��  ��  �����");
			Color(tcount %9+1);
			Sleep(200);
			putchar_at_xy(19, 18, "��      ��  ��      ��   ��      ��  ��");
			putchar_at_xy(19, 19, "  ����   ��        ��  ��      ��  �����");

			putchar_at_xy(21, 22, "2������ ���� �����ϴ� ����");
			putchar_at_xy(19, 23, "���� ���� ��:w ��:s ��:d ��:a");
			putchar_at_xy(19, 24, "���� ���� ��:�� ��:�� ��:�� ��:��");
		}
		if (tcount % 20 == 0) {
			display_.print_prompt("                                ");
		}
		Sleep(30);
	}
	
    int key;  //�Է¹��� Ű�� �����ϴ� ����	
    do
    {
        key = getch(); //�̿����� Ű�� ����
    }
    while (key != 'y' && key != 'Y' && key != 'n' && key != 'N'); //y,Y,n,N���� ���������� �ݺ�
 
    switch (key)
    {
    case 'y':
    case 'Y':
		Color(15);
        make_food();
        display_.clear();
        display_.print_wall();
        display_.print_snake(snake_1);
		display_.print_snake(snake_2);
        display_.print_food(food_position_);
        return RETURN_SUCCESS;
    case 'n':
    case 'N':
        return RETURN_EXIT;
    default:
        return RETURN_UNKNOWN;
    }
}
 
// play()
// ... ������ ������ �����Ű�� �̺�Ʈ�� ó���Ѵ�.
//
ReturnCode SnakeGame::play()
{
    int key;
	
    while (FOREVER)  //���� ���� ���ѷ���  FOREVER �� static const bool FOREVER = true; ���� �����
    {
		putchar_at_xy(81, 10,"* : ������");
		putchar_at_xy(81, 11, "����� ����");
		putchar_at_xy(81, 12,"# : ��ֹ�");
		putchar_at_xy(81, 13, "���� ����");
		putchar_at_xy(81, 7, "�޴� ��� : ESC");
        // Ű���� �Է��� �ִ� ��츦 ó���Ѵ�.
        if (kbhit())
        {
            key = getch();											 //�̿����� Ű�� ����
            if (key == 224)
            {																
                key = getch();				// ����Ű�� �ν��� �� ������ �����Ѵ�.
                switch (key)
                {
                case UP: case DOWN: case LEFT: case RIGHT:
                    snake_1.set_direction1((Keyboard)key);			 //���� ���� ��ȯ
                    break;
                default:
                    return RETURN_FATAL; 
                }
            }
            else if (key == ESC)									//Ű���� ESC�� �Է��� ��� ����
            {
                // �Ͻ����� �� �޴��� ����Ѵ�.
                switch (pause())									//pause()���� �Է´��
                {
                case RETURN_RESUME:									//pause()���� RETURN_RESUME���
                    display_.clear();								//ȭ�� ����
                    display_.print_wall();							//������
                    //display_.print_snake(snake_1);					//�����
					//display_.print_snake(snake_2);					//�����
                    display_.print_food(food_position_);			//�����ۻ���
					for (int i = 0; i<obstacleCount; i++) display_.print_obstacle(obstacle_position_[i]); //��ֹ� ���
                    break;
                case RETURN_NEWGAME:								//pause()����RETURN_NEWGAME �ϰ��
                    return RETURN_NEWGAME;							// ������ 
                case RETURN_STOP:									//pause()����RETURN_STOP �� ���
                    return RETURN_SUCCESS;							//����
                case RETURN_EXIT:									//pause()����RETURN_EXIT �� ���
                    return RETURN_EXIT;								//����
                default:
                    return RETURN_UNKNOWN;
                }
            }
			else {
				switch (key)
				{
				case 'w': case 's': case 'a': case 'd':
					snake_2.set_direction2((Keyboard)key);			 //���� ���� ��ȯ
					break;
				}
			}
        }
        Sleep(GAME_SPEED);
 
        snake_1.move1();
		snake_2.move2();
 
        // ���� ���� �ε����� ������ ������.
        if (snake_1.head1().X == 0 || snake_1.head1().X == 79 ||
            snake_1.head1().Y == 0 || snake_1.head1().Y == 24)
        {
            return RETURN_STOP;
        }
		if (snake_2.head2().X == 0 || snake_2.head2().X == 79 ||
			snake_2.head2().Y == 0 || snake_2.head2().Y == 24)
		{
			return RETURN_STOP;
		}
 
        // ���� �ڱ� ���� �������� ������ ������.
        else if (snake_1.is_bitten() == true)
        {
            return RETURN_STOP;
        } 
		else if (snake_2.is_bitten() == true)
		{
			return RETURN_STOP;
		}
        // ���� ���̸� �Ծ��ٸ� ���� ���̸� �ϳ� ������Ű�� ������ �ø���.
        // �� ȭ����� ���̰� ��������� ǥ���Ѵ�.
        else if (snake_1.head1().X == food_position_.X &&snake_1.head1().Y == food_position_.Y)
        {
			putchar_at_xy(snake_1.head1().X, snake_1.head1().Y, '@');
            score_++;										//������ ������ ���� ����
			if ((score_ % 4 == 0) && (GAME_SPEED>80))		// ���� 4 ������ �ӵ� ����
				GAME_SPEED -= 10;
			if (score_ % 3 == 0)				//������ 3�� ����� ��� ���̵� ����� ���� ��ֹ� �߰�
			{
				make_obstacle();		//���ο� ��ֹ� ����
				for (int i = 0; i<obstacleCount; i++) 
					display_.print_obstacle(obstacle_position_[i]);//ȭ�鿡 ��ֹ� ���
			}
            food_position_.X = 0;
            food_position_.Y = 0;
        }
		// ���� ���̸� �Ծ��ٸ� ���� ���̸� �ϳ� ������Ű�� ������ �ø���.
		// �� ȭ����� ���̰� ��������� ǥ���Ѵ�.
		else if (snake_2.head2().X == food_position_.X &&snake_2.head2().Y == food_position_.Y)
		{
			putchar_at_xy(snake_2.head2().X, snake_2.head2().Y, '&');
			score_++;										//������ ������ ���� ����
			if ((score_ % 4 == 0) && (GAME_SPEED>80))		// ���� 4 ������ �ӵ� ����
				GAME_SPEED -= 10;
			if (score_ %3 == 0)				//������ 3�� ����� ��� ���̵� ����� ���� ��ֹ� �߰�
			{
				make_obstacle();		//���ο� ��ֹ� ����
				for (int i = 0; i<obstacleCount; i++)
					display_.print_obstacle(obstacle_position_[i]);//ȭ�鿡 ��ֹ� ���
			}
			food_position_.X = 0;
			food_position_.Y = 0;
		}
		//���� ��ֹ��� �������� ������ �����Ѵ�.
		else if (CollisionCheck() == true)
			return RETURN_STOP;
        // ���� ���̸� ���� ���� �ƴ϶�� �Ϲ������� �����Ѵ�.
        else
        {
            putchar_at_xy(snake_1.head1().X, snake_1.head1().Y, '@');//�Ӹ��κ�
            putchar_at_xy(snake_1.tail1().X, snake_1.tail1().Y, ' ');//���� �κ�
            snake_1.body1().pop_back();								 //���� �޺κ� �����
			putchar_at_xy(snake_2.head2().X, snake_2.head2().Y, '&');
			putchar_at_xy(snake_2.tail2().X, snake_2.tail2().Y, ' ');
			snake_2.body2().pop_back();
        }
        // ���� ���̸� �Ծ� ���ݴٸ� �ٽ� �����.
        if (is_no_food() == true)
        {
            make_food();
            display_.print_food(food_position_);
        }		
    }
    return RETURN_SUCCESS;
}
 
// pause()
// ... ������ ��� ���߰� �޴��� �����ش�.
//
ReturnCode SnakeGame::pause()
{
    display_.print_prompt("(R)esume, (N)ew game, (S)top, (E)xit ");
 
    int key;
    do
    {
        key = getch();
	} while (key != 'r' && key != 'R' && key != 'n' && key != 'N' &&
		key != 's' && key != 'S' && key != 'e' && key != 'E');
 
    switch (key)
    {
    case 'r': case 'R':
        return RETURN_RESUME;
    case 'n': case 'N':
        return RETURN_NEWGAME;
    case 's': case 'S':
        return RETURN_STOP;
    case 'e': case 'E':
        return RETURN_EXIT;
    default:
        return RETURN_UNKNOWN;
    }
}
 
// stop()
//
ReturnCode SnakeGame::stop()
{
    display_.clear();
 
    // ȹ���� ������ ����Ѵ�.
    char msg[80];
    sprintf(msg, "Your score: %d ", score());
    display_.print_prompt(msg);
 
    // EnterŰ�� ������ ������ ���α׷��� �������� �ʴ´�.
    go_to_xy(55, 24);
    printf("Press [Enter] to quit...");
    while (getch() != ENTER)
        NOTHING;
    return RETURN_SUCCESS;
}
void SnakeGame::make_obstacle()
{
	int x, y;
	bool search_of_obstacle;
	srand((unsigned int)time(NULL));				//������ ���ϱ�
	do
	{
		search_of_obstacle = true;
		x = rand() % 65 + 2;    // 2 ~ 66
		y = rand() % 21 + 2;    // 2 ~ 22
		for (int i = 0; i<obstacleCount; i++){
			if (obstacle_position_[i].X != x && obstacle_position_[i].Y != y)	//���� ��ֹ��� ��ġ���� Ȯ��
				search_of_obstacle = false;
		}
		if (obstacleCount == 0) search_of_obstacle = false;		//��ֹ��� �ϳ��� ���� ��쿡�� üũ�� �ʿ� ����.
	} while (is_valid_snake_position(x, y) == false && search_of_obstacle == false);		//���̸� ���� �� �ִ� ��ġ���� Ȯ��

	obstacle_position_[obstacleCount].X = x;		//���ο� ��ֹ� ��ǥ ����
	obstacle_position_[obstacleCount].Y = y;
	obstacleCount++;
}
bool SnakeGame::CollisionCheck() {			//��ֹ��� ���� �Ӹ��� �΋H������ üũ
	for (int i = 0; i < obstacleCount; i++) 
		if (snake_1.head1().X == obstacle_position_[i].X && snake_1.head1().Y == obstacle_position_[i].Y)
			return true;
	for (int i = 0; i < obstacleCount; i++)
		if (snake_2.head2().X == obstacle_position_[i].X && snake_2.head2().Y == obstacle_position_[i].Y)
			return true;
}
// make_food()
// ... ���̸� ���´�.
//
void SnakeGame::make_food()
{
    int x, y;
 
    srand((unsigned int)time(NULL));
    do
    {
        x = rand() % 77 + 1;    // 1 ~ 77
        y = rand() % 23 + 1;    // 1 ~ 23
    }
    while (is_valid_snake_position(x, y) == false);
 
    food_position_.X = x;
    food_position_.Y = y;
}
// is_valid_food_position()
// ... ���̸� ���� �� �ִ� ��ġ�� true, �ƴϸ� false�� ��ȯ�Ѵ�.
//
bool SnakeGame::is_valid_snake_position(int x, int y)
{
    list<Position>::const_iterator iter1 = snake_1.body1().begin(); //���� ����ǥ��� ������ ���Ͽ� ��ġ�� ������ true����
    while (iter1 != snake_1.body1().end())
    {
        if ((x == iter1->X) && (y == iter1->Y))
            return false;
		iter1++;
    }
	list<Position>::const_iterator iter2 = snake_2.body2().begin(); //���� ����ǥ��� ������ ���Ͽ� ��ġ�� ������ true����
	while (iter2 != snake_2.body2().end())
	{
		if ((x == iter2->X) && (y == iter2->Y))
			return false;
		iter2++;
	}
	return true;
}
 
// is_no_food()
// ... ����ȭ�鿡 ���̰� ������ true, ������ false�� ��ȯ�Ѵ�.
//
bool SnakeGame::is_no_food()
{
    if (food_position_.X == 0 || food_position_.Y == 0)
        return true;
    else
        return false;
}
 
// score()
//
const SnakeGame::ScoreType SnakeGame::score() const
{
    return score_;
}