#ifndef __COMMON_H__
#define __COMMON_H__
 
#include <Windows.h>
 
#define NOTHING
 
typedef enum
{
    RETURN_EXIT     = -1,       // 프로그램 종료
    RETURN_FATAL    = -1,       // 에러
    RETURN_SUCCESS  =  0,       // 성공
    RETURN_FAILURE  =  1,       // 실패
    RETURN_UNKNOWN      ,       // 알 수 없음
    RETURN_RESUME       ,       // 다시 재생
    RETURN_NEWGAME      ,       // 새 게임
    RETURN_STOP         ,       // 게임 종료
    RETURN_FOOD         ,       // 먹이를 먹음
    RETURN_WALL                 // 벽에 부딪힘
} ReturnCode;
 
typedef enum
{
    UP    = 72,                 // 방향키 위
    DOWN  = 80,                 // 방향키 아래
    LEFT  = 75,                 // 방향키 왼쪽
    RIGHT = 77,                 // 방향키 오른쪽
    ENTER = 13,                 // 엔터 키
    ESC   = 27                  // ESC 키

} Keyboard;
 
typedef COORD Position;
 
static const bool FOREVER = true;	//게임 실행 무한 루프
static int GAME_SPEED = 100;		//게임 속도.
 
extern void go_to_xy(int x, int y);  //extern(외부변수) :다른파일에서 접근가능, 매개변수로 주어진 좌표로 커서 이동
extern void putchar_at_xy(int x, int y, char ch);
extern void putchar_at_xy(int x, int y, char* ch);
extern void Color(int i);
#endif