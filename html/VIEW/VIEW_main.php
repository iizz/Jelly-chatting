<div class="menu-wrap chat-menu-box">
	<div class="menu">
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
	<div class="morph-shape" id="morph-shape" data-morph-open="M-7.312,0H15c0,0,66,113.339,66,399.5C81,664.006,15,800,15,800H-7.312V0z;M-7.312,0H100c0,0,0,113.839,0,400c0,264.506,0,400,0,400H-7.312V0z">
		<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
			<path d="M-7.312,0H0c0,0,0,113.839,0,400c0,264.506,0,400,0,400h-7.312V0z"/>
		</svg>
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
				<select name="roomOpen" class="form-control rc-open rc-input">
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
<button type="button" class="menu-button" id="open-button"></button>
<div class="container">
	<div class="chat-box">
		<div>
			<span class="hidden">
				접속한 방 번호 : <span class="joinRoomNumberSpan"><?= $user['roomNumber'] ?></span>
			</span>
			<div class="room-title pull-left">
				<span class="joinRoomNameSpan"><?= $user['roomName'] ?></span>
				<span class="room-joinuser-count"></span>
			</div>
			<div class="rc-modify-btn" style="display:<?= getRoomSettingBoxDisplay() ?>">
				<button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#roomModifyModal">
					<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
				</button>
			</div>
			<div class="clearfix"></div>
			<div> 
				<div class="roomUserList"></div> <!-- 방 접속자 리스트 -->
				<div class="changeChattingUpdate">
					<button type="button" class="btn btn-default" onclick="changeChattingUpdate();">
						<span class="glyphicon glyphicon-play" style="display:none"></span>
						<span class="glyphicon glyphicon-pause"></span>
					</button>
				</div>
				<div class="clearfix"></div>
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

<!-- 채티방 수정 -->
<div class="modal fade rc-modal" id="roomModifyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
				채팅방 수정
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<select name="modifyRoomOpen" class="form-control rc-open">
					<option value="1">공개</option>
					<option value="0">비공개</option>
				</select>
				<input type="text" name="ModifyRoomNameInput" value="<?= $user['roomName'] ?>" class="form-control" onkeypress="if (event.keyCode == 13) {
								checkModifyRoomSetting();
								return false;
							}" />
				<input type="password" name="ModifyRoomPasswordInput" class="form-control rc-modify-pw" onkeypress="if (event.keyCode == 13) {
								checkModifyRoomSetting();
								return false;
							}" placeholder="비밀번호를 입력해주세요." style="display:none" />
			</div>
			<div class="modal-footer">
				<input name="roomClass" value="1" style="display:none" />
				<input type="submit" value="채팅방 수정" onclick="checkModifyRoomSetting();
						return false;" class="btn btn-default" />
				<input type="submit" onclick="checkDeleteRoom();
							return false;" value="채팅방 삭제" class="btn btn-default" />
			</div>
		</div>
	</div>
</div>