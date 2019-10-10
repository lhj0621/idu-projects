#ifndef __SNAKE_H__
#define __SNAKE_H__
 
#include <list>
using namespace std;
 
#include "common.h"
 
class Snake
{
	typedef unsigned int SnakeLengthType;
 
public:
    Snake();
    void initialize();							//뱀 전체 정보 초기화.
    void set_direction1(Keyboard key);			//1.뱀의 움직이는 방향을 설정
	void set_direction2(Keyboard key);			//2.뱀의 움직이는 방향을 설정
    void move1();								//1.진행방향에 따라 알맞는 move함수를 호출한다.
	void move2();								//2.진행방향에 따라 알맞는 move함수를 호출한다.
    bool is_bitten();
 
    list<Position>& Snake::body1();				//뱀 전체의 위치를 담고있는 list를 반환
    const list<Position> Snake::body1() const;	//뱀 전체의 위치를 담고있는ㅣist를 상수객체로 반환
    const Position head1() const;				//뱀 머리의 위치를 반환
	const Position tail1() const;				//뱀 꼬리의 위치를 반환

	list<Position>& Snake::body2();				//뱀 전체의 위치를 담고있는 list를 반환
	const list<Position> Snake::body2() const;	//뱀 전체의 위치를 담고있는ㅣist를 상수객체로 반환
	const Position head2() const;				//뱀 머리의 위치를 반환
	const Position tail2() const;				//뱀 꼬리의 위치를 반환
 
private:
    void move_up1();							//뱀의 방향을 위로 진행				
    void move_down1();							//뱀의 방향을 아래로 진행
    void move_left1();							//뱀의 방향을 죄측으로 진행
    void move_right1();							//뱀의 방향을 우측으로 진행

	void move_up2();							//뱀의 방향을 위로 진행				
	void move_down2();							//뱀의 방향을 아래로 진행
	void move_left2();							//뱀의 방향을 죄측으로 진행
	void move_right2();							//뱀의 방향을 우측으로 진행

    const int direction() const;
 
private:
    int direction_1;								//사용자로부터 입력받는 키를 저장 변수
	int direction_2;
    list<Position> body_1;						//연결리스트로 뱀 구현
	list<Position> body_2;						//연결리스트로 뱀 구현
};
 
#endif