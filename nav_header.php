<nav role="navigation" class="nav" id="nav">
	<a href="<?= ROOT ?>/profile" class="link">
		<svg width="20" height="20" viewBox="0 0 24 24">
			<path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7.753 18.305c-.261-.586-.789-.991-1.871-1.241-2.293-.529-4.428-.993-3.393-2.945 3.145-5.942.833-9.119-2.489-9.119-3.388 0-5.644 3.299-2.489 9.119 1.066 1.964-1.148 2.427-3.393 2.945-1.084.25-1.608.658-1.867 1.246-1.405-1.723-2.251-3.919-2.251-6.31 0-5.514 4.486-10 10-10s10 4.486 10 10c0 2.389-.845 4.583-2.247 6.305z" />
		</svg>
		<h3><?php echo $user_data['first_name'] . " " . $user_data['last_name']; ?></h3>
	</a>

	<a href="<?= ROOT ?>profile/<?php echo $user_data['tag_name'] ?>/about" class="link">
		<svg width="20" height="20" viewBox="0 0 24 24">
			<path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-.001 5.75c.69 0 1.251.56 1.251 1.25s-.561 1.25-1.251 1.25-1.249-.56-1.249-1.25.559-1.25 1.249-1.25zm2.001 12.25h-4v-1c.484-.179 1-.201 1-.735v-4.467c0-.534-.516-.618-1-.797v-1h3v6.265c0 .535.517.558 1 .735v.999z" />
		</svg>
		<h3>About</h3>
	</a>

	<a href="<?= ROOT ?>profile/<?php echo $user_data['tag_name'] ?>/followers" class="link">
		<svg width="20" height="20" viewBox="0 0 24 24">
			<path d="M9.602 3.7c-1.154 1.937-.635 5.227 1.424 9.025.93 1.712.697 3.02.338 3.815-.982 2.178-3.675 2.799-6.525 3.456-1.964.454-1.839.87-1.839 4.004h-1.995l-.005-1.241c0-2.52.199-3.975 3.178-4.663 3.365-.777 6.688-1.473 5.09-4.418-4.733-8.729-1.35-13.678 3.732-13.678 3.321 0 5.97 2.117 5.97 6.167 0 3.555-1.949 6.833-2.383 7.833h-2.115c.392-1.536 2.499-4.366 2.499-7.842 0-5.153-5.867-4.985-7.369-2.458zm13.398 15.3h-3v-3h-2v3h-3v2h3v3h2v-3h3v-2z" />
		</svg>
		<h3>Followers</h3>
	</a>

	<a href="<?= ROOT ?>profile/<?php echo $user_data['tag_name'] ?>/following" class="link">
		<svg width="20" height="20" version="1.1" id="Capa_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
			<g>
				<g>
					<g>
						<path d="M234.071,471.132H60.391c-6.453,0-12.333-2.991-16.135-8.207c-3.803-5.218-4.85-11.736-2.874-17.883
				c19.732-61.346,79.908-104.191,146.336-104.191c30.909,0,60.591,9.308,85.838,26.916c9.043,6.307,21.485,4.09,27.795-4.953
				c6.306-9.043,4.089-21.486-4.954-27.794c-12.498-8.717-25.85-15.828-39.817-21.257c18.583-16.896,30.911-40.555,33.053-67.048
				c28.177-27.448,65.111-42.488,104.704-42.488c30.909,0,60.591,9.308,85.838,26.916c9.043,6.307,21.486,4.09,27.795-4.953
				c6.306-9.043,4.089-21.486-4.954-27.794c-12.498-8.717-25.85-15.828-39.817-21.257c20.499-18.638,33.386-45.506,33.386-75.328
				C496.586,45.673,450.913,0,394.774,0c-56.14,0-101.812,45.673-101.812,101.813c0,29.701,12.784,56.473,33.139,75.102
				c-2.785,1.072-5.55,2.212-8.295,3.42c-12.492,5.497-24.241,12.245-35.162,20.183c-15.068-37.415-51.746-63.893-94.49-63.893
				c-56.14,0-101.812,45.673-101.812,101.813c0,29.614,12.71,56.316,32.96,74.938c-54.148,20.292-98.053,63.87-115.927,119.444
				c-5.928,18.431-2.788,37.976,8.616,53.623c11.402,15.645,29.042,24.618,48.401,24.618h173.68
				c11.026,0,19.963-8.938,19.963-19.963S245.096,471.132,234.071,471.132z M394.775,39.926c34.124,0,61.886,27.762,61.886,61.886
				s-27.762,61.886-61.886,61.886c-34.124,0-61.886-27.762-61.886-61.886S360.651,39.926,394.775,39.926z M188.155,176.55
				c34.124,0,61.886,27.762,61.886,61.886s-27.762,61.886-61.886,61.886s-61.886-27.762-61.886-61.886
				S154.031,176.55,188.155,176.55z" />
						<path d="M503.217,326.082c-8.965-6.418-21.436-4.354-27.853,4.612l-98.4,137.447c-2.687,3.116-6.055,3.789-7.859,3.909
				c-1.857,0.127-5.463-0.114-8.555-3.057l-63.703-61.168c-7.954-7.638-20.593-7.379-28.226,0.573
				c-7.637,7.952-7.38,20.59,0.572,28.226l63.767,61.228c9.55,9.091,22.298,14.149,35.414,14.149c1.127,0,2.257-0.037,3.387-0.113
				c14.288-0.952,27.628-7.9,36.599-19.062c0.233-0.289,0.455-0.584,0.672-0.885l98.799-138.006
				C514.247,344.97,512.183,332.5,503.217,326.082z" />
					</g>
				</g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
		</svg>
		<h3>Following</h3>
	</a>

	<a href="<?= ROOT ?>profile/<?php echo $user_data['tag_name'] ?>/photos" class="link">
		<svg width="20" height="20" viewBox="0 0 24 24">
			<path d="M5 4h-3v-1h3v1zm10.93 0l.812 1.219c.743 1.115 1.987 1.781 3.328 1.781h1.93v13h-20v-13h3.93c1.341 0 2.585-.666 3.328-1.781l.812-1.219h5.86zm1.07-2h-8l-1.406 2.109c-.371.557-.995.891-1.664.891h-5.93v17h24v-17h-3.93c-.669 0-1.293-.334-1.664-.891l-1.406-2.109zm-11 8c0-.552-.447-1-1-1s-1 .448-1 1 .447 1 1 1 1-.448 1-1zm7 0c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0-2c-2.761 0-5 2.239-5 5s2.239 5 5 5 5-2.239 5-5-2.239-5-5-5z" />
		</svg>
		<h3>Photos</h3>
	</a>

	<a href="<?= ROOT ?>profile/<?php echo $user_data['tag_name'] ?>/groups" class="link">
		<svg width="20" height="20" version="1.1" id="Capa_1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
			<g>
				<g>
					<path d="M437,268.152h-50.118c-6.821,0-13.425,0.932-19.71,2.646c-12.398-24.372-37.71-41.118-66.877-41.118h-88.59
			c-29.167,0-54.479,16.746-66.877,41.118c-6.285-1.714-12.889-2.646-19.71-2.646H75c-41.355,0-75,33.645-75,75v80.118
			c0,24.813,20.187,45,45,45h422c24.813,0,45-20.187,45-45v-80.118C512,301.797,478.355,268.152,437,268.152z M136.705,304.682
			v133.589H45c-8.271,0-15-6.729-15-15v-80.118c0-24.813,20.187-45,45-45h50.118c4.072,0,8.015,0.553,11.769,1.572
			C136.779,301.366,136.705,303.016,136.705,304.682z M345.295,438.271h-178.59V304.681c0-24.813,20.187-45,45-45h88.59
			c24.813,0,45,20.187,45,45V438.271z M482,423.271c0,8.271-6.729,15-15,15h-91.705v-133.59c0-1.667-0.074-3.317-0.182-4.957
			c3.754-1.018,7.697-1.572,11.769-1.572H437c24.813,0,45,20.187,45,45V423.271z" />
				</g>
			</g>
			<g>
				<g>
					<path d="M100.06,126.504c-36.749,0-66.646,29.897-66.646,66.646c-0.001,36.749,29.897,66.646,66.646,66.646
			c36.748,0,66.646-29.897,66.646-66.646C166.706,156.401,136.809,126.504,100.06,126.504z M100.059,229.796
			c-20.207,0-36.646-16.439-36.646-36.646c0-20.207,16.439-36.646,36.646-36.646c20.207,0,36.646,16.439,36.646,36.646
			C136.705,213.357,120.266,229.796,100.059,229.796z" />
				</g>
			</g>
			<g>
				<g>
					<path d="M256,43.729c-49.096,0-89.038,39.942-89.038,89.038c0,49.096,39.942,89.038,89.038,89.038s89.038-39.942,89.038-89.038
			C345.038,83.672,305.096,43.729,256,43.729z M256,191.805c-32.554,0-59.038-26.484-59.038-59.038
			c0-32.553,26.484-59.038,59.038-59.038s59.038,26.484,59.038,59.038C315.038,165.321,288.554,191.805,256,191.805z" />
				</g>
			</g>
			<g>
				<g>
					<path d="M411.94,126.504c-36.748,0-66.646,29.897-66.646,66.646c0.001,36.749,29.898,66.646,66.646,66.646
			c36.749,0,66.646-29.897,66.646-66.646C478.586,156.401,448.689,126.504,411.94,126.504z M411.94,229.796
			c-20.206,0-36.646-16.439-36.646-36.646c0.001-20.207,16.44-36.646,36.646-36.646c20.207,0,36.646,16.439,36.646,36.646
			C448.586,213.357,432.147,229.796,411.94,229.796z" />
				</g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
			<g>
			</g>
		</svg>
		<h3>Groups</h3>
	</a>

	<a href="<?= ROOT ?>profile/<?php echo $user_data['tag_name'] ?>/settings" class="link">
		<svg width="20" height="20" width="24" height="24" viewBox="0 0 24 24">
			<path d="M24 14.187v-4.374c-2.148-.766-2.726-.802-3.027-1.529-.303-.729.083-1.169 1.059-3.223l-3.093-3.093c-2.026.963-2.488 1.364-3.224 1.059-.727-.302-.768-.889-1.527-3.027h-4.375c-.764 2.144-.8 2.725-1.529 3.027-.752.313-1.203-.1-3.223-1.059l-3.093 3.093c.977 2.055 1.362 2.493 1.059 3.224-.302.727-.881.764-3.027 1.528v4.375c2.139.76 2.725.8 3.027 1.528.304.734-.081 1.167-1.059 3.223l3.093 3.093c1.999-.95 2.47-1.373 3.223-1.059.728.302.764.88 1.529 3.027h4.374c.758-2.131.799-2.723 1.537-3.031.745-.308 1.186.099 3.215 1.062l3.093-3.093c-.975-2.05-1.362-2.492-1.059-3.223.3-.726.88-.763 3.027-1.528zm-4.875.764c-.577 1.394-.068 2.458.488 3.578l-1.084 1.084c-1.093-.543-2.161-1.076-3.573-.49-1.396.581-1.79 1.693-2.188 2.877h-1.534c-.398-1.185-.791-2.297-2.183-2.875-1.419-.588-2.507-.045-3.579.488l-1.083-1.084c.557-1.118 1.066-2.18.487-3.58-.579-1.391-1.691-1.784-2.876-2.182v-1.533c1.185-.398 2.297-.791 2.875-2.184.578-1.394.068-2.459-.488-3.579l1.084-1.084c1.082.538 2.162 1.077 3.58.488 1.392-.577 1.785-1.69 2.183-2.875h1.534c.398 1.185.792 2.297 2.184 2.875 1.419.588 2.506.045 3.579-.488l1.084 1.084c-.556 1.121-1.065 2.187-.488 3.58.577 1.391 1.689 1.784 2.875 2.183v1.534c-1.188.398-2.302.791-2.877 2.183zm-7.125-5.951c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0-2c-2.762 0-5 2.238-5 5s2.238 5 5 5 5-2.238 5-5-2.238-5-5-5z" />
		</svg>
		<h3>Settings</h3>
	</a>
</nav>