#include <cstdlib>
#include <ctime>
#include <conio.h>
#include<iostream>
#include "snake_game.h"
using std::cout;
// 생성자()
//
SnakeGame::SnakeGame()
{
    initialize();
}

 
// initialize()
// ... 먹이 위치와 점수를 초기화한다.
//
void SnakeGame::initialize()
{
    food_position_.X = 0; 
    food_position_.Y = 0;  //아이템의 위치 초기화
	obstacleCount = 0; //장애물 개수 초기화
    score_ = 0;  //점수 초기화
}
 
// start()
// ... 게임 플레이 전 여러가지를 처리한다.
//
ReturnCode SnakeGame::start()
{
    this->initialize();     // 점수와 먹이위치를 초기화한다.
    snake_1.initialize();    // 뱀의 길이 및 위치를 초기화한다.
	snake_2.initialize();    // 뱀의 길이 및 위치를 초기화한다.

 
    display_.clear(); //화면 지우기
  //  display_.print_prompt("Do you want to play? (y/n) ");  //게임 진행 여부 확인


	for (int tcount = 0;; tcount++) { //키를 입력하면 무한루프 종료.
		if (kbhit()) break;
		if (tcount % 10 == 0) {
			Color(tcount %9+1);
			putchar_at_xy(24,11, "※ Do you want to play? (Y/N) ※\n ");  //puts있으니까 헤더파일 추가해주시고 gotoxy()쓸 수 있게
			putchar_at_xy(14, 3, "  ■■■   ■      ■      ■      ■    ■  ■■■■");
			putchar_at_xy(14, 4, "■         ■■    ■    ■  ■    ■  ■    ■");
			Color(tcount%9+1);
			Sleep(200);
			putchar_at_xy(14, 5, "  ■■■   ■  ■  ■   ■■■■   ■■      ■■■■");
			putchar_at_xy(14, 6, "        ■ ■    ■■  ■      ■  ■  ■    ■");
			Color(tcount %9+1);
			Sleep(200);
			putchar_at_xy(14, 7, "  ■■■   ■      ■ ■        ■ ■    ■  ■■■■");

			putchar_at_xy(19, 15, "  ■■■        ■       ■      ■  ■■■■");
			Color(tcount %9+1);
			Sleep(200);
			putchar_at_xy(19, 16, "■            ■  ■     ■■  ■■  ■");
			putchar_at_xy(19, 17, "■    ■■   ■■■■    ■  ■  ■  ■■■■");
			Color(tcount %9+1);
			Sleep(200);
			putchar_at_xy(19, 18, "■      ■  ■      ■   ■      ■  ■");
			putchar_at_xy(19, 19, "  ■■■   ■        ■  ■      ■  ■■■■");

			putchar_at_xy(21, 22, "2마리의 뱀을 조종하는 게임");
			putchar_at_xy(19, 23, "좌측 뱀은 상:w 하:s 좌:d 우:a");
			putchar_at_xy(19, 24, "좌측 뱀은 상:↑ 하:↓ 좌:← 우:→");
		}
		if (tcount % 20 == 0) {
			display_.print_prompt("                                ");
		}
		Sleep(30);
	}
	
    int key;  //입력받을 키를 저장하는 변수	
    do
    {
        key = getch(); //이용자의 키값 저장
    }
    while (key != 'y' && key != 'Y' && key != 'n' && key != 'N'); //y,Y,n,N값을 받을때까지 반복
 
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
// ... 실제로 게임을 실행시키고 이벤트를 처리한다.
//
ReturnCode SnakeGame::play()
{
    int key;
	
    while (FOREVER)  //게임 진행 무한루프  FOREVER 는 static const bool FOREVER = true; 으로 선언됨
    {
		putchar_at_xy(81, 10,"* : 아이템");
		putchar_at_xy(81, 11, "뱀길이 증가");
		putchar_at_xy(81, 12,"# : 장애물");
		putchar_at_xy(81, 13, "게임 종료");
		putchar_at_xy(81, 7, "메뉴 출력 : ESC");
        // 키보드 입력이 있는 경우를 처리한다.
        if (kbhit())
        {
            key = getch();											 //이용자의 키값 저장
            if (key == 224)
            {																
                key = getch();				// 방향키를 인식한 후 방향을 설정한다.
                switch (key)
                {
                case UP: case DOWN: case LEFT: case RIGHT:
                    snake_1.set_direction1((Keyboard)key);			 //뱀의 방향 전환
                    break;
                default:
                    return RETURN_FATAL; 
                }
            }
            else if (key == ESC)									//키값이 ESC를 입력할 경우 실행
            {
                // 일시정지 후 메뉴를 출력한다.
                switch (pause())									//pause()값을 입력대기
                {
                case RETURN_RESUME:									//pause()값이 RETURN_RESUME경우
                    display_.clear();								//화면 지움
                    display_.print_wall();							//벽생성
                    //display_.print_snake(snake_1);					//뱀생성
					//display_.print_snake(snake_2);					//뱀생성
                    display_.print_food(food_position_);			//아이템생성
					for (int i = 0; i<obstacleCount; i++) display_.print_obstacle(obstacle_position_[i]); //장애물 출력
                    break;
                case RETURN_NEWGAME:								//pause()값이RETURN_NEWGAME 일경우
                    return RETURN_NEWGAME;							// 새게임 
                case RETURN_STOP:									//pause()값이RETURN_STOP 일 경우
                    return RETURN_SUCCESS;							//정지
                case RETURN_EXIT:									//pause()값이RETURN_EXIT 일 경우
                    return RETURN_EXIT;								//종료
                default:
                    return RETURN_UNKNOWN;
                }
            }
			else {
				switch (key)
				{
				case 'w': case 's': case 'a': case 'd':
					snake_2.set_direction2((Keyboard)key);			 //뱀의 방향 전환
					break;
				}
			}
        }
        Sleep(GAME_SPEED);
 
        snake_1.move1();
		snake_2.move2();
 
        // 뱀이 벽에 부딪히면 게임이 끝난다.
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
 
        // 뱀이 자기 몸을 물었으면 게임이 끝난다.
        else if (snake_1.is_bitten() == true)
        {
            return RETURN_STOP;
        } 
		else if (snake_2.is_bitten() == true)
		{
			return RETURN_STOP;
		}
        // 뱀이 먹이를 먹었다면 뱀의 길이를 하나 증가시키고 점수를 올린다.
        // 또 화면상의 먹이가 사라졌음을 표시한다.
        else if (snake_1.head1().X == food_position_.X &&snake_1.head1().Y == food_position_.Y)
        {
			putchar_at_xy(snake_1.head1().X, snake_1.head1().Y, '@');
            score_++;										//아이템 먹을면 점수 증가
			if ((score_ % 4 == 0) && (GAME_SPEED>80))		// 점수 4 개마다 속도 증가
				GAME_SPEED -= 10;
			if (score_ % 3 == 0)				//점수가 3의 배수일 경우 난이도 상승을 위해 장애물 추가
			{
				make_obstacle();		//새로운 장애물 생성
				for (int i = 0; i<obstacleCount; i++) 
					display_.print_obstacle(obstacle_position_[i]);//화면에 장애물 출력
			}
            food_position_.X = 0;
            food_position_.Y = 0;
        }
		// 뱀이 먹이를 먹었다면 뱀의 길이를 하나 증가시키고 점수를 올린다.
		// 또 화면상의 먹이가 사라졌음을 표시한다.
		else if (snake_2.head2().X == food_position_.X &&snake_2.head2().Y == food_position_.Y)
		{
			putchar_at_xy(snake_2.head2().X, snake_2.head2().Y, '&');
			score_++;										//아이템 먹을면 점수 증가
			if ((score_ % 4 == 0) && (GAME_SPEED>80))		// 점수 4 개마다 속도 증가
				GAME_SPEED -= 10;
			if (score_ %3 == 0)				//점수가 3의 배수일 경우 난이도 상승을 위해 장애물 추가
			{
				make_obstacle();		//새로운 장애물 생성
				for (int i = 0; i<obstacleCount; i++)
					display_.print_obstacle(obstacle_position_[i]);//화면에 장애물 출력
			}
			food_position_.X = 0;
			food_position_.Y = 0;
		}
		//뱀이 장애물과 마주차면 게임을 종료한다.
		else if (CollisionCheck() == true)
			return RETURN_STOP;
        // 뱀이 먹이를 먹은 것이 아니라면 일반적으로 진행한다.
        else
        {
            putchar_at_xy(snake_1.head1().X, snake_1.head1().Y, '@');//머리부분
            putchar_at_xy(snake_1.tail1().X, snake_1.tail1().Y, ' ');//꼬리 부분
            snake_1.body1().pop_back();								 //꼬리 뒷부분 지우기
			putchar_at_xy(snake_2.head2().X, snake_2.head2().Y, '&');
			putchar_at_xy(snake_2.tail2().X, snake_2.tail2().Y, ' ');
			snake_2.body2().pop_back();
        }
        // 뱀이 먹이를 먹어 없앴다면 다시 만든다.
        if (is_no_food() == true)
        {
            make_food();
            display_.print_food(food_position_);
        }		
    }
    return RETURN_SUCCESS;
}
 
// pause()
// ... 게임을 잠시 멈추고 메뉴를 보여준다.
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
 
    // 획득한 점수를 출력한다.
    char msg[80];
    sprintf(msg, "Your score: %d ", score());
    display_.print_prompt(msg);
 
    // Enter키를 누르기 전까지 프로그램을 종료하지 않는다.
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
	srand((unsigned int)time(NULL));				//랜덤값 구하기
	do
	{
		search_of_obstacle = true;
		x = rand() % 65 + 2;    // 2 ~ 66
		y = rand() % 21 + 2;    // 2 ~ 22
		for (int i = 0; i<obstacleCount; i++){
			if (obstacle_position_[i].X != x && obstacle_position_[i].Y != y)	//기존 장애물과 겹치는지 확인
				search_of_obstacle = false;
		}
		if (obstacleCount == 0) search_of_obstacle = false;		//장애물이 하나도 없을 경우에는 체크할 필요 없음.
	} while (is_valid_snake_position(x, y) == false && search_of_obstacle == false);		//먹이를 놓을 수 있는 위치인지 확인

	obstacle_position_[obstacleCount].X = x;		//새로운 장애물 좌표 저장
	obstacle_position_[obstacleCount].Y = y;
	obstacleCount++;
}
bool SnakeGame::CollisionCheck() {			//장애물과 뱀의 머리가 부딫히는지 체크
	for (int i = 0; i < obstacleCount; i++) 
		if (snake_1.head1().X == obstacle_position_[i].X && snake_1.head1().Y == obstacle_position_[i].Y)
			return true;
	for (int i = 0; i < obstacleCount; i++)
		if (snake_2.head2().X == obstacle_position_[i].X && snake_2.head2().Y == obstacle_position_[i].Y)
			return true;
}
// make_food()
// ... 먹이를 놓는다.
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
// ... 먹이를 놓을 수 있는 위치면 true, 아니면 false를 반환한다.
//
bool SnakeGame::is_valid_snake_position(int x, int y)
{
    list<Position>::const_iterator iter1 = snake_1.body1().begin(); //뱀의 몸좌표들과 일일히 비교하여 겹치지 않으면 true리턴
    while (iter1 != snake_1.body1().end())
    {
        if ((x == iter1->X) && (y == iter1->Y))
            return false;
		iter1++;
    }
	list<Position>::const_iterator iter2 = snake_2.body2().begin(); //뱀의 몸좌표들과 일일히 비교하여 겹치지 않으면 true리턴
	while (iter2 != snake_2.body2().end())
	{
		if ((x == iter2->X) && (y == iter2->Y))
			return false;
		iter2++;
	}
	return true;
}
 
// is_no_food()
// ... 게임화면에 먹이가 없으면 true, 있으면 false를 반환한다.
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