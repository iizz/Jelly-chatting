<div class="chat-menu-box">
    <div>
        <div>방 리스트</div>
        <div class="room-list"></div> <!-- 방 리스트 -->
    </div>
    <div>
        <div>방 접속자</div> 
        <div class="roomUserList"></div> <!-- 방 접속자 리스트 -->
    </div>
    <hr />
    <div>
        <div>방 만들기</div> 
        <input type="text" name="roomName" onkeypress="if(event.keyCode==13) {checkCreateRoom(); return false;}" class="form-control" />
        <input type="password" name="roomPasswordInput" onkeypress="if(event.keyCode==13) {checkCreateRoom(); return false;}" class="form-control" />
        <select name="roomOpen" class="form-control">
            <option value="1">공개</option>
            <option value="0">비공개</option>
        </select>
        <select name="roomClass" class="form-control">
            <? getRoomClassSelectBox() ?>
        </select>
        <input type="submit" value="방만들기" onclick="checkCreateRoom(); return false;" class="btn btn-default" />
    </div>
</div>
<div class="container">
    <div class="chat-box">
        <div>
            <span>
                접속한 방 번호 : <span class="joinRoomNumberSpan"><?=$user['roomNumber']?></span>
            </span>
            <span>
                방 이름 :  <span class="joinRoomNameSpan"><?=$user['roomName']?></span>
            </span>
            <span>
                <input type="submit" onclick="checkDeleteRoom(); return false;" value="룸 삭제" class="btn btn-default" />
            </span>
            <span>
                룸 이름 변경 :  <input type="text" name="ModifyRoomNameInput" value="<?=$user['roomName']?>" class="form-control" onkeypress="if(event.keyCode==13) {checkModifyRoomName(); return false;}" />
                <input type="submit" onclick="checkModifyRoomName(); return false;" value="룸이름 변경" class="btn btn-default" />
            </span>
        </div>
        <div class="chat-area"></div> <!-- 채팅 내용 -->
        <div>
            <div class="form-group">
                <input type="text" value="<?=$user['nickname']?>" onkeypress="if(event.keyCode==13) {checkModifyUsername(); return false;}" name="userNameInput" class="form-control chat-nick" />
                <select name="state" class="form-control chat-state">
                <? getChattingStateSelectBox() ?>
                </select>
                <div class="clearfix"></div>
            </div>
            <input type="text" name="content" onkeypress="if(event.keyCode==13) {putChattingContent(); return false;}" class="form-control chat-content" />
            <input type="submit" onclick="putChattingContent(); return false;" value="입력" class="btn btn-default chat-btn" />
            <div class="clearfix"></div>
        </div>
    </div>
</div>