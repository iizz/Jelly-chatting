<div class="container">
	<div class="chat-box">
		<div class="chat_area"></div> <!-- 채팅 내용 -->
		<div>
			<input type="text" name="userNicknameInput" style="width:100px;" value="<?=$user['nickname']?>" readonly class="form-control" />
			<select name="state" style="width:100px;" class="form-control">
			<?
				$tableName = "chatState";
				$tableColumn = "seq, name";
				$row = selectTable($tableName, $tableColumn);
			?>
			<? foreach ($row as $key => $val) { ?>
				<option value="<?=$val[0]?>"><?=$val[1]?></option>
			<? } ?>
			</select>
			<br />
			<input type="text" name="content" onkeypress="if(event.keyCode==13) {putChattingContent();}" style="width:600px;" class="form-control" />
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
			<div class="room_list"></div> <!-- 방 리스트 -->
			<div>
				접속한 방 번호 : <span class="userRoomNumberSpan"><?=$user['roomNumber']?></span>
			</div>
			<div>
				<input type="number" value="<?=$user['roomNumber']?>" name="roomNumberInput" class="form-control" />
				<input type="submit" value="방번호 변경" onclick="changeRoomNumber(); return false;" class="btn btn-default" />
			</div>
		</div>
		<div>
			<div>방 접속자</div> 
			<div class="roomUserList"></div> <!-- 방 접속자 리스트 -->
		</div>
	</div>
	<div class="clearfix"></div>
</div>