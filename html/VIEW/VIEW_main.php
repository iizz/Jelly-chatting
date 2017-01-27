<div class="container">
	<div class="chat-box">
		<div class="chat-area"></div> <!-- 채팅 내용 -->
		<div>
			<input type="text" name="userNicknameInput" style="width:100px;" value="<?=$user['nickname']?>" readonly class="form-control" />
			<select name="state" style="width:100px;" class="form-control">
			<? getChattingStateSelectBox() ?>
			</select>
			<br />
			<input type="text" name="content" onkeypress="if(event.keyCode==13) {putChattingContent(); return false;}" style="width:600px;" class="form-control" />
			<input type="submit" onclick="putChattingContent(); return false;" value="입력" class="btn btn-default" />
		</div>
	</div>
	<div class="chat-menu-box">
		<div>
			<div>
				당신의 아이피 : <span class="userIpSpan"><?=$user['ip']?></span>
			</div>
			<div>
				당신의 이름 : <span class="userNameSpan"><?=$user['nickname']?></span>
			</div>
			<div>
				<input type="text" value="<?=$user['nickname']?>" name="userNameInput" class="form-control" />
				<input type="submit" value="닉네임 수정" onclick="changeUserName(); return false;" class="btn btn-default" />
			</div>
		</div>
		<div>
			<div>방 리스트</div>
			<div class="room-list"></div> <!-- 방 리스트 -->
			<div>
				접속한 방 번호 : <span class="userRoomNumberSpan"><?=$user['roomNumber']?></span>
			</div>
			<div>
				<input type="number" value="<?=$user['roomNumber']?>" onkeypress="if(event.keyCode==13) {changeRoomNumber(); return false;}" name="roomNumberInput" class="form-control" />
				<input type="submit" value="방번호 변경" onclick="changeRoomNumber(); return false;" class="btn btn-default" />
			</div>
		</div>
		<div>
			<div>방 접속자</div> 
			<div class="roomUserList"></div> <!-- 방 접속자 리스트 -->
		</div>
		<hr />
		<div>
			<div>방 만들기</div> 
			<input type="text" name="roomName" onkeypress="if(event.keyCode==13) {putRoomCreate(); return false;}" class="form-control" />
			<select name="roomOpen">
				<option value="1">공개</option>
				<option value="0">비공개</option>
			</select>
			<select name="roomClass">
				<? getRoomClassSelectBox() ?>
			</select>
			<input type="submit" value="방만들기" onclick="putRoomCreate(); return false;" class="btn btn-default" />
		</div>
	</div>
	<div class="clearfix"></div>
</div>