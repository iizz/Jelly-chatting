<div class="menu-wrap chat-menu-box">
	<button type="button" class="btn rc-btn" data-toggle="modal" data-target="#roomCreateModal">
		채팅방 만들기
	</button>
	<div> <!-- 전체 접속자 -->
		<span>전체접속자 : </span>
		<span class="userTotalCount"><?= $user['userTotalCount'] ?></span>
	</div>
	<div>
		<div>채팅방 리스트</div>
		<div class="room-list"></div> <!-- 방 리스트 -->
	</div>
</div>
<div class="contents-curtains"></div>
<div class="modal fade rc-modal" id="roomCreateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
				채팅방 만들기
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<select name="roomOpen" class="form-control rc-open">
					<option value="1">공개</option>
					<option value="0">비공개</option>
				</select>
				<input type="text" name="roomName" onkeypress="if (event.keyCode == 13) {
							checkCreateRoom();
							return false;
						}" class="form-control" placeholder="채팅방 이름을 입력해주세요." />
				<input type="password" name="roomPasswordInput" onkeypress="if (event.keyCode == 13) {
							checkCreateRoom();
							return false;
						}" class="form-control rc-pw" placeholder="비밀번호를 입력해주세요." />
			</div>
			<div class="modal-footer">
				<input name="roomClass" value="1" style="display:none" />
				<input type="submit" value="방만들기" onclick="checkCreateRoom();
						return false;" class="btn btn-default" />
			</div>
		</div>
	</div>
</div>
<a href="javascript:void(0)" class="menu-button"></a>
<div class="container">
	<div class="chat-box">
		<div>
			<span class="hidden">
				접속한 방 번호 : <span class="joinRoomNumberSpan"><?= $user['roomNumber'] ?></span>
			</span>
			<div class="room-title">
				<span class="joinRoomNameSpan"><?= $user['roomName'] ?></span>
				<span class="room-joinuser-count"></span>
			</div>
			<div class="room-setting" style="display:<?= getRoomSettingBoxDisplay() ?>">
				<span>
					룸 이름 변경 :  <input type="text" name="ModifyRoomNameInput" value="<?= $user['roomName'] ?>" class="form-control" onkeypress="if (event.keyCode == 13) {
								checkModifyRoomSetting();
								return false;
							}" />
					<select name="modifyRoomOpen" class="form-control">
						<option value="1">공개</option>
						<option value="0">비공개</option>
					</select>
				</span>
				<span>
					<input type="password" name="ModifyRoomPasswordInput" class="form-control" onkeypress="if (event.keyCode == 13) {
								checkModifyRoomSetting();
								return false;
							}" />
					<input type="submit" onclick="checkModifyRoomSetting();
							return false;" value="룸속성 변경" class="btn btn-default" />
					<input type="submit" onclick="checkDeleteRoom();
							return false;" value="룸 삭제" class="btn btn-default" />
				</span>
			</div>
			<div> 
				<div class="roomUserList"></div> <!-- 방 접속자 리스트 -->
			</div>
		</div>
		<div class="chat-area"></div> <!-- 채팅 내용 -->
		<div>
			<div class="form-group">
				<input type="text" value="<?= $user['nickName'] ?>" onkeypress="if (event.keyCode == 13) {
							checkModifyUsername();
							return false;
						}" name="userNameInput" class="form-control chat-nick" />
				<select name="state" class="form-control chat-state">
					<?= getChattingStateSelectBox() ?>
				</select>
				<div class="pull-right">
					<button onclick="pageUpdate();" class="btn btn-default">Update</button> <!-- 수동 업데이트 -->
				</div>
				<div class="clearfix"></div>
			</div>
			<input type="text" name="content" onkeypress="if (event.keyCode == 13) {
						putChattingContent();
						return false;
					}" class="form-control chat-content" />
			<input type="submit" onclick="putChattingContent();
					return false;" value="입력" class="btn btn-default chat-btn" />
			<div class="clearfix"></div>
		</div>
	</div>
</div>

