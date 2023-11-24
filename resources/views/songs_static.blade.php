<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Spotify Clone Project</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.App {
  --vertical-nav-width: 232px;
  --now-playing-bar-height: 11vh;
  width: 100vw;
  height: 100vh;
  background-color: darkgray;
  overflow-x: hidden;
  overflow-y: hidden;
  display: grid;
  grid-template-areas: "nav-bar main-view" "now-playing-bar now-playing-bar";
  grid-template-columns: auto 1fr;
  grid-template-rows: 1fr auto;
  position: relative;
  scrollbar-width: none;
  font-size: 16px;
}
.App::-webkit-scrollbar {
  display: none;
}
.App .test {
  border: 1px solid magenta;
}
.App__top-bar {
  grid-area: main-view;
  height: 60px;
  z-index: 2;
}
.App__nav-bar {
  grid-area: nav-bar;
  width: var(--vertical-nav-width);
  height: 100%;
  min-height: 100%;
  background-color: #000;
  padding-top: 24px;
  padding-bottom: var(--now-playing-bar-height);
}
.App__logo {
  display: grid;
  place-items: center;
}
.App__categories-nav {
  color: #c4c4c4;
  padding: 18px 12px;
}
.App__category-item--selected {
  color: #fff;
  background-color: rgba(50, 50, 50, 0.6);
  border-radius: 5px;
}
.App__category-item {
  padding: 5px 16px;
  display: flex;
  flex-direction: row;
  align-items: center;
  margin: 5px 0;
}
.App__category-item .icon {
  width: 36px;
  height: 36px;
  display: grid;
  place-items: center;
  margin-right: 10px;
}
.App__category-item .icon svg {
  width: 24px;
  height: 24px;
}
.App__playlists-nav {
  color: #c4c4c4;
  padding: 18px 12px;
}
.App__now-playing-bar {
  grid-area: now-playing-bar;
  background-color: #181818;
  border-top: 1px solid #202020;
  height: var(--now-playing-bar-height);
  z-index: 4;
}
.App__main-view {
  grid-area: main-view;
  background-color: #121212;
  position: relative;
  z-index: 1;
  max-height: calc(100vh - var(--now-playing-bar-height));
  overflow-x: hidden;
  overflow-y: scroll;
  scrollbar-width: none;
}
.App__main-view::-webkit-scrollbar {
  display: none;
}
.App__header {
  width: 100%;
  height: 60px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 16px 32px;
}
.App__song-navigation {
  display: flex;
  flex-direction: row;
}
.App__song-navigation-prev, .App__song-navigation-next {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.5);
  color: #fff;
  display: grid;
  place-items: center;
  margin-right: 16px;
  cursor: not-allowed;
}
.App__song-navigation-prev svg, .App__song-navigation-next svg {
  color: #fff;
}
.App__user {
  border: 0;
  display: flex;
  flex-direction: row;
  align-items: center;
  height: 32px;
  border-radius: 16px;
  padding: 1px;
  background-color: #000;
}
.App__figure {
  width: 25px;
  height: 25px;
  background-color: #2a2a2a;
  border-radius: 50%;
  margin-right: 8px;
  margin-left: 2px;
  display: grid;
  place-items: center;
}
.App__username {
  color: #fff;
  font-size: 0.9em;
  margin-right: 8px;
}
.App__expand-arrow {
  transform: rotateZ(180deg);
  margin-right: 8px;
}
.App__top-gradient {
  height: 332px;
  width: 100%;
  margin-top: -60px;
  background-image: linear-gradient(rgba(0, 0, 0, 0.6) 0%, #121212 100%);
  background-color: #5028f0;
  position: absolute;
  top: 0;
  right: 0;
  z-index: -1;
}
.App__header-placeholder {
  height: 60px;
  width: 100%;
}
.App__section {
  padding: 16px 32px;
  color: #fff;
}
.App__quick-links-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
  gap: 24px;
  margin-top: 16px;
}
.App__quick-link {
  background-color: #30294b;
  height: 80px;
  border-radius: 4px;
  display: flex;
  flex-direction: row;
  align-items: center;
  box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.2);
}
.App__quick-link-featured-img {
  height: 80px;
  width: 80px;
  border-radius: 4px 0 0 4px;
  background-color: #efefef;
  box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.5);
  margin-right: 16px;
  background-image: linear-gradient(to bottom right, blue, white);
}
.App__quick-link-featured-img:nth-of-type(1) {
  font-size: 2em;
  display: grid;
  place-items: center;
}
.App__section-header {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
.App__section-header span {
  color: #686868;
  font-size: 0.8em;
}
.App__section-grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
  column-gap: 24px;
  margin-top: 16px;
  grid-template-rows: 1fr;
  grid-auto-rows: 0;
  /* set height to 0 for autogenerated grid rows */
  overflow-y: hidden;
  /* hide grid items that overflow */
}
.App__section-grid-item {
  background-color: #242424;
  width: 100%;
  height: auto;
  min-height: 150px;
  padding: 10%;
  border-radius: 4px;
}
.App__section-grid-item .featured-image {
  width: 100%;
  height: 0;
  padding-bottom: 100%;
  border-radius: 4px;
  background-image: linear-gradient(to bottom right, blue, white);
  background-size: cover;
  margin-bottom: 16px;
  box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.5);
}
.App__section-grid-item:nth-of-type(1) .featured-image {
  background-image: url("https://i.scdn.co/image/239649cd6dfd2296632d269b115d1e147695a0a8");
}
.App__section-grid-item:nth-of-type(2) .featured-image {
  background-image: url("https://i.scdn.co/image/1ec33564b0c0c1db64babdcf678a5246a4605c6f");
}
.App__section-grid-item:nth-of-type(3) .featured-image {
  background-image: url("https://i.scdn.co/image/50a4653e91a472a85b6759225ffd5a2f71d8a9ba");
}
.App__section-grid-item:nth-of-type(4) .featured-image {
  background-image: url("https://i.scdn.co/image/8feb7ba9f991af98307ae1de9c491c43754765dc");
}
.App__section-grid-item:nth-of-type(5) .featured-image {
  background-image: url("https://i.scdn.co/image/15488d6d07e4d31d388be232f921569bd32d1ac3");
}
.App__section-grid-item h3 {
  margin-bottom: 8px;
}
.App__section-grid-item span {
  color: #686868;
  font-size: 0.8em;
}
.function{
  display: flex;
  /* align-items: center; */
  justify-content: center;
  width: auto;
  background-color: rgb(27, 27, 27);
}
.function .music{
  width: 20vw;
  height: 11vh;
  display: flex;
  align-items: center;
  margin-left: 0.5vh;
  background-color: transparent;
}
.function .music img{
  width:10vh;
  height: 10vh;
  border: 0px solid;
  border-radius: 2vh;
}
.function .music .details{
  display: flex;
  flex-direction: column;
  justify-content: center;
  color: white;
  font-family: 'Inter', sans-serif;
  margin-left: 2vh;
  padding-bottom: 1vh;
  background-color: transparent;
}
.function .music .details .name{
  /* display: flex; */
  /* justify-content: left; */
  font-size: 3vh;
  /* background-color: brown; */
  justify-content: left;
  display: flex;
  background-color: transparent;
  font-weight: bold;
  padding-left: 0px;
}
.function .music .details .artist{
  font-size: 2vh;
  background-color: transparent;

}
.function .music .love{
  background-color: transparent;
}
.function .music .love img{
  /* filter: invert(); */
  background-color: transparent;
  padding: 0px;
  margin-left: 2vh;
  margin-right: 2vh;
  width: 4vh;
  height: 4vh;
  /* background-color: ; */
  /* fill: red; */
}
.function .playback{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 1vh;
  width: 60vw;
  height: 4vh;
  background-color: transparent;
}
.function .playback .upper{
  width: 50vw;
  background-color: transparent;
  height: 6vh;
  margin-top: 3vh;
  margin-bottom: 1vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
.function .playback .upper img{
  width: 3vh;
  height:3vh;
  margin-left: 1vh;
  margin-right: 1vh;
  background-color: transparent;
  filter: invert();

}
.function .playback .upper img.pause{
  width: 4vh;
  height: 4vh;
}
.function .playback .lower{
  width: 50vw;
  background-color: transparent;
  /* height: 5vh; */
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Inter', sans-serif;
  font-size: 1.5vh;
  color: white;
}
.function .playback .lower .line{
  width: 50vh;
  height: 1vh;
  background-color: white;
  border: 0px 0px 0px 0px solid;
  border-radius: 1vh;
}
.function .playback .lower .text{
  background-color: transparent;
  margin-left: 1vh;
  margin-right: 1vh;
}
.function .control{
  width: 20vw;
  height: 11vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: transparent;
}
.function .control .images{
  display: flex;
  justify-content: center;
  background-color: transparent;
  align-items: center;
}
.function .control .images img{
  width: 3vh;
  height: 3vh;
  background-color: transparent;
  filter: invert();
  margin-left: 1vh;
  margin-right: 1vh;
}
.function .control .images .line{
  width: 13vh;
  height: 1vh;
  background-color: white;
  border: 0px 0px 0px 0px solid;
  border-radius: 1vh;
  padding-left: 1vh;
  padding-right: 1vh;
}

    </style>
  </head>
  <body>
    <div class="App">
      <div class="App__top-bar">
        <div class="App__header">
          <div class="App__song-navigation">
            <div class="App__song-navigation-prev">
              <svg role="img" focusable="false" height="24" width="24" viewBox="0 0 24 24"><polyline points="16 4 7 12 16 20" fill="none" stroke="#fff"></polyline></svg>
            </div>
            <div class="App__song-navigation-next">
              <svg role="img" focusable="false" height="24" width="24" viewBox="0 0 24 24"><polyline points="8 4 17 12 8 20" fill="none" stroke="#fff"></polyline></svg>
            </div>
          </div>
          <button class="App__user">
            <div class="App__figure">
              <svg width="16" height="16" fill="currentColor" viewBox="0 0 18 20" xmlns="http://www.w3.org/2000/svg" data-testid="user-icon"><path d="M15.216 13.717L12 11.869C11.823 11.768 11.772 11.607 11.757 11.521C11.742 11.435 11.737 11.267 11.869 11.111L13.18 9.57401C14.031 8.58001 14.5 7.31101 14.5 6.00001V5.50001C14.5 3.98501 13.866 2.52301 12.761 1.48601C11.64 0.435011 10.173 -0.0879888 8.636 0.0110112C5.756 0.198011 3.501 2.68401 3.501 5.67101V6.00001C3.501 7.31101 3.97 8.58001 4.82 9.57401L6.131 11.111C6.264 11.266 6.258 11.434 6.243 11.521C6.228 11.607 6.177 11.768 5.999 11.869L2.786 13.716C1.067 14.692 0 16.526 0 18.501V20H1V18.501C1 16.885 1.874 15.385 3.283 14.584L6.498 12.736C6.886 12.513 7.152 12.132 7.228 11.691C7.304 11.251 7.182 10.802 6.891 10.462L5.579 8.92501C4.883 8.11101 4.499 7.07201 4.499 6.00001V5.67101C4.499 3.21001 6.344 1.16201 8.699 1.00901C9.961 0.928011 11.159 1.35601 12.076 2.21501C12.994 3.07601 13.5 4.24301 13.5 5.50001V6.00001C13.5 7.07201 13.117 8.11101 12.42 8.92501L11.109 10.462C10.819 10.803 10.696 11.251 10.772 11.691C10.849 12.132 11.115 12.513 11.503 12.736L14.721 14.585C16.127 15.384 17.001 16.884 17.001 18.501V20H18.001V18.501C18 16.526 16.932 14.692 15.216 13.717Z" fill="#fff"></path></svg>
            </div>
            <span class="App__username">Yourname</span>
            <div class="App__expand-arrow">
              <svg role="img" height="16" width="16" viewBox="0 0 16 16"><path d="M13 10L8 4.206 3 10z" fill="#fff"></path></svg>
            </div>
          </button>
        </div>
      </div>
      <div class="App__nav-bar">
        <div class="App__logo">
          <svg viewBox="0 0 254 37" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M11.578 29.38C9.17133 29.38 7.10667 29.0253 5.384 28.316C3.66133 27.6067 2.35667 26.682 1.47 25.542C0.608667 24.3767 0.152667 23.11 0.102 21.742C0.102 21.5393 0.178 21.362 0.33 21.21C0.507333 21.0327 0.71 20.944 0.938 20.944H5.726C6.03 20.944 6.27067 21.0073 6.448 21.134C6.65067 21.2353 6.85333 21.4 7.056 21.628C7.38533 22.2867 7.91733 22.8313 8.652 23.262C9.38667 23.6927 10.362 23.908 11.578 23.908C13.022 23.908 14.124 23.68 14.884 23.224C15.644 22.768 16.024 22.1473 16.024 21.362C16.024 20.8047 15.8213 20.3487 15.416 19.994C15.036 19.6393 14.428 19.3227 13.592 19.044C12.756 18.7653 11.5147 18.4487 9.868 18.094C6.828 17.4607 4.548 16.536 3.028 15.32C1.53333 14.0787 0.786 12.318 0.786 10.038C0.786 8.49267 1.21667 7.112 2.078 5.896C2.93933 4.68 4.168 3.73 5.764 3.046C7.36 2.362 9.222 2.02 11.35 2.02C13.554 2.02 15.4667 2.4 17.088 3.16C18.7093 3.92 19.938 4.88267 20.774 6.048C21.6353 7.188 22.0913 8.31533 22.142 9.43C22.142 9.658 22.066 9.848 21.914 10C21.762 10.152 21.572 10.228 21.344 10.228H16.328C16.024 10.228 15.7707 10.1773 15.568 10.076C15.3907 9.97467 15.226 9.81 15.074 9.582C14.922 8.99933 14.504 8.50533 13.82 8.1C13.1613 7.69467 12.338 7.492 11.35 7.492C10.21 7.492 9.336 7.69467 8.728 8.1C8.12 8.50533 7.816 9.10067 7.816 9.886C7.816 10.418 7.98067 10.8613 8.31 11.216C8.66467 11.5707 9.222 11.9 9.982 12.204C10.7673 12.4827 11.882 12.774 13.326 13.078C15.682 13.5087 17.5567 14.0533 18.95 14.712C20.3687 15.3453 21.4073 16.1813 22.066 17.22C22.7247 18.2333 23.054 19.5127 23.054 21.058C23.054 22.7553 22.56 24.2373 21.572 25.504C20.6093 26.7453 19.254 27.708 17.506 28.392C15.7833 29.0507 13.8073 29.38 11.578 29.38ZM27.3893 36.22C27.1359 36.22 26.9079 36.1313 26.7053 35.954C26.5279 35.7767 26.4393 35.5487 26.4393 35.27V10.19C26.4393 9.91133 26.5279 9.68333 26.7053 9.506C26.9079 9.32867 27.1359 9.24 27.3893 9.24H31.6833C31.9619 9.24 32.1899 9.32867 32.3673 9.506C32.5446 9.68333 32.6333 9.91133 32.6333 10.19V11.558C34.0013 9.75933 35.9646 8.86 38.5233 8.86C41.0059 8.86 42.9439 9.63267 44.3373 11.178C45.7306 12.7233 46.4906 14.902 46.6173 17.714C46.6426 18.0433 46.6553 18.512 46.6553 19.12C46.6553 19.728 46.6426 20.1967 46.6173 20.526C46.5159 23.262 45.7559 25.428 44.3373 27.024C42.9186 28.5947 40.9806 29.38 38.5233 29.38C36.0406 29.38 34.1913 28.5313 32.9753 26.834V35.27C32.9753 35.5487 32.8866 35.7767 32.7093 35.954C32.5319 36.1313 32.3039 36.22 32.0253 36.22H27.3893ZM36.4713 24.288C37.6619 24.288 38.5106 23.9333 39.0173 23.224C39.5493 22.5147 39.8533 21.5393 39.9293 20.298C39.9799 19.7913 40.0053 19.3987 40.0053 19.12C40.0053 18.8413 39.9799 18.4487 39.9293 17.942C39.8533 16.7007 39.5493 15.7253 39.0173 15.016C38.5106 14.3067 37.6619 13.952 36.4713 13.952C35.3059 13.952 34.4446 14.3193 33.8873 15.054C33.3553 15.7633 33.0513 16.688 32.9753 17.828L32.9373 19.234L32.9753 20.678C33.0259 21.7167 33.3426 22.578 33.9253 23.262C34.5079 23.946 35.3566 24.288 36.4713 24.288ZM59.7599 29.38C56.6186 29.38 54.1993 28.6327 52.5019 27.138C50.8046 25.6433 49.8799 23.5407 49.7279 20.83C49.7026 20.5007 49.6899 19.9307 49.6899 19.12C49.6899 18.3093 49.7026 17.7393 49.7279 17.41C49.8799 14.7247 50.8299 12.6347 52.5779 11.14C54.3259 9.62 56.7199 8.86 59.7599 8.86C62.8253 8.86 65.2319 9.62 66.9799 11.14C68.7279 12.6347 69.6779 14.7247 69.8299 17.41C69.8553 17.7393 69.8679 18.3093 69.8679 19.12C69.8679 19.9307 69.8553 20.5007 69.8299 20.83C69.6779 23.5407 68.7533 25.6433 67.0559 27.138C65.3586 28.6327 62.9266 29.38 59.7599 29.38ZM59.7599 24.744C60.8746 24.744 61.6979 24.4147 62.2299 23.756C62.7619 23.072 63.0659 22.0333 63.1419 20.64C63.1673 20.3867 63.1799 19.88 63.1799 19.12C63.1799 18.36 63.1673 17.8533 63.1419 17.6C63.0659 16.232 62.7493 15.206 62.1919 14.522C61.6599 13.838 60.8493 13.496 59.7599 13.496C57.6573 13.496 56.5426 14.864 56.4159 17.6L56.3779 19.12L56.4159 20.64C56.4666 22.0333 56.7579 23.072 57.2899 23.756C57.8473 24.4147 58.6706 24.744 59.7599 24.744ZM83.6762 29C78.4322 29 75.8102 26.5047 75.8102 21.514V14.218H72.8462C72.5675 14.218 72.3268 14.1293 72.1242 13.952C71.9468 13.7747 71.8582 13.5467 71.8582 13.268V10.19C71.8582 9.91133 71.9468 9.68333 72.1242 9.506C72.3268 9.32867 72.5675 9.24 72.8462 9.24H75.8102V2.97C75.8102 2.69133 75.8988 2.46333 76.0762 2.286C76.2788 2.10867 76.5068 2.02 76.7602 2.02H81.1682C81.4468 2.02 81.6748 2.10867 81.8522 2.286C82.0295 2.46333 82.1182 2.69133 82.1182 2.97V9.24H86.8682C87.1468 9.24 87.3748 9.32867 87.5522 9.506C87.7548 9.68333 87.8562 9.91133 87.8562 10.19V13.268C87.8562 13.5467 87.7548 13.7747 87.5522 13.952C87.3748 14.1293 87.1468 14.218 86.8682 14.218H82.1182V20.982C82.1182 22.8567 82.8402 23.794 84.2842 23.794H87.2102C87.4888 23.794 87.7168 23.8827 87.8942 24.06C88.0715 24.2373 88.1602 24.4653 88.1602 24.744V28.05C88.1602 28.3033 88.0715 28.5313 87.8942 28.734C87.7168 28.9113 87.4888 29 87.2102 29H83.6762ZM92.2185 6.39C91.9398 6.39 91.7118 6.30133 91.5345 6.124C91.3571 5.94667 91.2685 5.71867 91.2685 5.44V2.02C91.2685 1.74133 91.3571 1.51333 91.5345 1.336C91.7118 1.15867 91.9398 1.07 92.2185 1.07H96.7785C97.0571 1.07 97.2851 1.15867 97.4625 1.336C97.6398 1.51333 97.7285 1.74133 97.7285 2.02V5.44C97.7285 5.71867 97.6398 5.94667 97.4625 6.124C97.2851 6.30133 97.0571 6.39 96.7785 6.39H92.2185ZM92.2565 29C91.9778 29 91.7498 28.9113 91.5725 28.734C91.3951 28.5567 91.3065 28.3287 91.3065 28.05V10.19C91.3065 9.91133 91.3951 9.68333 91.5725 9.506C91.7498 9.32867 91.9778 9.24 92.2565 9.24H96.7405C97.0191 9.24 97.2471 9.32867 97.4245 9.506C97.6018 9.68333 97.6905 9.91133 97.6905 10.19V28.05C97.6905 28.3033 97.6018 28.5313 97.4245 28.734C97.2471 28.9113 97.0191 29 96.7405 29H92.2565ZM105.372 29C105.118 29 104.89 28.9113 104.688 28.734C104.51 28.5313 104.422 28.3033 104.422 28.05V14.218H101.534C101.255 14.218 101.027 14.1293 100.85 13.952C100.672 13.7747 100.584 13.5467 100.584 13.268V10.19C100.584 9.91133 100.672 9.68333 100.85 9.506C101.027 9.32867 101.255 9.24 101.534 9.24H104.422V8.024C104.422 5.516 105.131 3.70467 106.55 2.59C107.994 1.45 110.058 0.88 112.744 0.88H115.708C115.986 0.88 116.214 0.968666 116.392 1.146C116.569 1.32333 116.658 1.55133 116.658 1.83V4.908C116.658 5.16133 116.569 5.38933 116.392 5.592C116.214 5.76933 115.986 5.858 115.708 5.858H113.048C112.212 5.858 111.616 6.06067 111.262 6.466C110.907 6.846 110.73 7.42867 110.73 8.214V9.24H115.328C115.606 9.24 115.834 9.32867 116.012 9.506C116.189 9.68333 116.278 9.91133 116.278 10.19V13.268C116.278 13.5213 116.189 13.7493 116.012 13.952C115.834 14.1293 115.606 14.218 115.328 14.218H110.73V28.05C110.73 28.3033 110.641 28.5313 110.464 28.734C110.286 28.9113 110.058 29 109.78 29H105.372ZM122.713 36.22C122.485 36.22 122.295 36.144 122.143 35.992C121.991 35.84 121.915 35.65 121.915 35.422C121.915 35.2447 121.953 35.08 122.029 34.928L124.993 27.784L117.697 10.532C117.621 10.3293 117.583 10.1773 117.583 10.076C117.634 9.848 117.735 9.658 117.887 9.506C118.039 9.32867 118.229 9.24 118.457 9.24H122.789C123.321 9.24 123.688 9.506 123.891 10.038L128.223 21.096L132.669 10.038C132.922 9.506 133.302 9.24 133.809 9.24H138.065C138.293 9.24 138.483 9.32867 138.635 9.506C138.812 9.658 138.901 9.83533 138.901 10.038C138.901 10.1393 138.863 10.304 138.787 10.532L128.033 35.422C127.83 35.954 127.45 36.22 126.893 36.22H122.713ZM160.15 29.38C156.527 29.38 153.69 28.506 151.638 26.758C149.611 24.9847 148.535 22.426 148.408 19.082C148.383 18.398 148.37 17.2833 148.37 15.738C148.37 14.1673 148.383 13.0273 148.408 12.318C148.535 9.02467 149.637 6.49133 151.714 4.718C153.791 2.91933 156.603 2.02 160.15 2.02C162.379 2.02 164.381 2.4 166.154 3.16C167.927 3.89467 169.321 4.95867 170.334 6.352C171.373 7.72 171.905 9.32867 171.93 11.178V11.254C171.93 11.4567 171.841 11.634 171.664 11.786C171.512 11.9127 171.335 11.976 171.132 11.976H166.002C165.673 11.976 165.419 11.9127 165.242 11.786C165.065 11.634 164.913 11.368 164.786 10.988C164.431 9.696 163.874 8.79667 163.114 8.29C162.354 7.758 161.353 7.492 160.112 7.492C157.123 7.492 155.577 9.164 155.476 12.508C155.451 13.192 155.438 14.2433 155.438 15.662C155.438 17.0807 155.451 18.1573 155.476 18.892C155.577 22.236 157.123 23.908 160.112 23.908C161.353 23.908 162.367 23.642 163.152 23.11C163.937 22.5527 164.482 21.6533 164.786 20.412C164.887 20.032 165.027 19.7787 165.204 19.652C165.381 19.5 165.647 19.424 166.002 19.424H171.132C171.36 19.424 171.55 19.5 171.702 19.652C171.879 19.804 171.955 19.994 171.93 20.222C171.905 22.0713 171.373 23.6927 170.334 25.086C169.321 26.454 167.927 27.518 166.154 28.278C164.381 29.0127 162.379 29.38 160.15 29.38ZM176.458 29C176.204 29 175.976 28.9113 175.774 28.734C175.596 28.5313 175.508 28.3033 175.508 28.05V2.97C175.508 2.69133 175.596 2.46333 175.774 2.286C175.976 2.10867 176.204 2.02 176.458 2.02H180.942C181.22 2.02 181.448 2.10867 181.626 2.286C181.803 2.46333 181.892 2.69133 181.892 2.97V28.05C181.892 28.3287 181.803 28.5567 181.626 28.734C181.448 28.9113 181.22 29 180.942 29H176.458ZM195.729 29.38C192.587 29.38 190.168 28.6327 188.471 27.138C186.773 25.6433 185.849 23.5407 185.697 20.83C185.671 20.5007 185.659 19.9307 185.659 19.12C185.659 18.3093 185.671 17.7393 185.697 17.41C185.849 14.7247 186.799 12.6347 188.547 11.14C190.295 9.62 192.689 8.86 195.729 8.86C198.794 8.86 201.201 9.62 202.949 11.14C204.697 12.6347 205.647 14.7247 205.799 17.41C205.824 17.7393 205.837 18.3093 205.837 19.12C205.837 19.9307 205.824 20.5007 205.799 20.83C205.647 23.5407 204.722 25.6433 203.025 27.138C201.327 28.6327 198.895 29.38 195.729 29.38ZM195.729 24.744C196.843 24.744 197.667 24.4147 198.199 23.756C198.731 23.072 199.035 22.0333 199.111 20.64C199.136 20.3867 199.149 19.88 199.149 19.12C199.149 18.36 199.136 17.8533 199.111 17.6C199.035 16.232 198.718 15.206 198.161 14.522C197.629 13.838 196.818 13.496 195.729 13.496C193.626 13.496 192.511 14.864 192.385 17.6L192.347 19.12L192.385 20.64C192.435 22.0333 192.727 23.072 193.259 23.756C193.816 24.4147 194.639 24.744 195.729 24.744ZM210.561 29C210.282 29 210.054 28.9113 209.877 28.734C209.7 28.5567 209.611 28.3287 209.611 28.05V10.19C209.611 9.91133 209.7 9.68333 209.877 9.506C210.054 9.32867 210.282 9.24 210.561 9.24H214.931C215.21 9.24 215.438 9.32867 215.615 9.506C215.818 9.68333 215.919 9.91133 215.919 10.19V11.634C216.603 10.798 217.477 10.1267 218.541 9.62C219.63 9.11333 220.859 8.86 222.227 8.86C224.456 8.86 226.268 9.62 227.661 11.14C229.054 12.6347 229.751 14.7373 229.751 17.448V28.05C229.751 28.3033 229.662 28.5313 229.485 28.734C229.308 28.9113 229.08 29 228.801 29H224.013C223.76 29 223.532 28.9113 223.329 28.734C223.152 28.5313 223.063 28.3033 223.063 28.05V17.676C223.063 16.4853 222.772 15.5733 222.189 14.94C221.606 14.2813 220.77 13.952 219.681 13.952C218.617 13.952 217.781 14.2813 217.173 14.94C216.565 15.5733 216.261 16.4853 216.261 17.676V28.05C216.261 28.3033 216.172 28.5313 215.995 28.734C215.818 28.9113 215.59 29 215.311 29H210.561ZM243.149 29.38C240.109 29.38 237.715 28.5567 235.967 26.91C234.219 25.2633 233.307 22.8693 233.231 19.728V18.398C233.332 15.4087 234.257 13.078 236.005 11.406C237.778 9.70867 240.147 8.86 243.111 8.86C245.264 8.86 247.076 9.30333 248.545 10.19C250.04 11.0513 251.154 12.242 251.889 13.762C252.649 15.282 253.029 17.03 253.029 19.006V19.918C253.029 20.1713 252.94 20.3993 252.763 20.602C252.586 20.7793 252.358 20.868 252.079 20.868H239.919V21.134C239.97 22.3247 240.261 23.2873 240.793 24.022C241.325 24.7567 242.098 25.124 243.111 25.124C243.744 25.124 244.264 24.9973 244.669 24.744C245.074 24.4653 245.442 24.136 245.771 23.756C245.999 23.4773 246.176 23.3127 246.303 23.262C246.455 23.186 246.683 23.148 246.987 23.148H251.699C251.927 23.148 252.117 23.224 252.269 23.376C252.446 23.5027 252.535 23.68 252.535 23.908C252.535 24.5667 252.155 25.3267 251.395 26.188C250.66 27.0493 249.584 27.7967 248.165 28.43C246.746 29.0633 245.074 29.38 243.149 29.38ZM246.341 17.106V17.03C246.341 15.7887 246.05 14.8133 245.467 14.104C244.91 13.3693 244.124 13.002 243.111 13.002C242.123 13.002 241.338 13.3693 240.755 14.104C240.198 14.8133 239.919 15.7887 239.919 17.03V17.106H246.341Z" fill="white"/>
    </svg>

        </div>
        <div class="App__categories-nav">
          <div class="App__category-item App__category-item--selected">
            <div class="icon"><svg viewBox="0 0 576 512" width="100" title="home">
      <path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z" fill="#fff"/>
    </svg></div>
            <span>Home</span>
          </div>
          <div class="App__category-item">
            <div class="icon"><svg viewBox="0 0 512 512" width="100" title="search">
      <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" fill="#C4C4C4"/>
    </svg></div>
            <span>Search</span>
          </div>
          <div class="App__category-item">
            <div class="icon"><svg width="112" height="111" viewBox="0 0 112 111" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect width="8" height="111" fill="#C4C4C4"/>
    <rect x="24" width="8" height="111" fill="#C4C4C4"/>
    <rect width="7.96484" height="111.503" transform="matrix(0.869849 -0.493319 0.506711 0.862116 48 14.7345)" fill="#C4C4C4"/>
    </svg>
    </div>
            <span>Your Library</span>
          </div>
        </div>
        <div class="App__playlists-nav">
          <div class="App__category-item">
            <div class="icon"><svg role="img" height="12" width="12" aria-hidden="true" viewBox="0 0 16 16" fill="#c4c4c4"><path d="M14 7H9V2H7v5H2v2h5v5h2V9h5z"></path><path fill="none" d="M0 0h16v16H0z"></path></svg>
    </div>
            <span>Create Playlist</span>
          </div>
          <div class="App__category-item">
            <div class="icon"><svg role="img" height="12" width="12" aria-hidden="true" viewBox="0 0 16 16"><path fill="none" d="M0 0h16v16H0z"></path><path d="M13.797 2.727a4.057 4.057 0 00-5.488-.253.558.558 0 01-.31.112.531.531 0 01-.311-.112 4.054 4.054 0 00-5.487.253c-.77.77-1.194 1.794-1.194 2.883s.424 2.113 1.168 2.855l4.462 5.223a1.791 1.791 0 002.726 0l4.435-5.195a4.052 4.052 0 001.195-2.883 4.057 4.057 0 00-1.196-2.883z" fill="#c4c4c4"></path></svg>
    </div>
            <span>Liked Songs</span>
          </div>
          <div class="App__category-item">
            <div class="icon"><svg role="img" width="12" height="12" viewBox="0 0 527 483" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 264.208C1.5 119.17 118.974 1.5 264 1.5C409.026 1.5 526.5 119.17 526.5 264.208C526.5 351.905 483.535 429.569 417.628 477.247C406.996 484.938 392.595 481.729 385.684 471.362L376.758 457.971C369.699 447.382 372.818 433.617 382.485 426.529C432.426 389.914 464.783 330.851 464.783 264.208C464.783 153.128 374.839 63.1707 264 63.1707C153.161 63.1707 63.2173 153.128 63.2173 264.208C63.2173 330.851 95.5742 389.914 145.515 426.529C155.182 433.617 158.301 447.382 151.242 457.971L142.316 471.362C135.405 481.729 121.004 484.938 110.372 477.247C44.4653 429.569 1.5 351.905 1.5 264.208Z" fill="#1ED760"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M104.5 263.216C104.5 174.586 175.78 102.5 264 102.5C352.22 102.5 423.5 174.586 423.5 263.216C423.5 315.346 398.84 361.707 360.685 391.048C350.27 399.057 336.041 395.66 329.404 385.602L323.251 376.279C316.458 365.986 319.652 353.018 328.353 346.12C352.699 326.817 368.307 296.878 368.307 263.216C368.307 204.912 321.476 157.884 264 157.884C206.524 157.884 159.693 204.912 159.693 263.216C159.693 296.878 175.301 326.817 199.647 346.12C208.348 353.018 211.542 365.986 204.749 376.279L198.596 385.602C191.959 395.66 177.73 399.057 167.315 391.048C129.16 361.707 104.5 315.346 104.5 263.216Z" fill="#1ED760"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M200.5 261C200.5 226.296 229.118 198.5 264 198.5C298.882 198.5 327.5 226.296 327.5 261C327.5 295.704 298.882 323.5 264 323.5C229.118 323.5 200.5 295.704 200.5 261Z" fill="#1ED760"></path></svg>
    </div>
            <span>Your Episodes</span>
          </div>
        </div>
        <div class="App__divider-container"><hr></div>

      </div>
      <div class="App__now-playing-bar">
        <div class="function">
          <div class="music">
            <img
              src="https://c.saavncdn.com/578/Gulabi-Sharara-Hindi-2023-20230805021516-500x500.jpg"
              alt=""
            />
            <div class="details">
              <div class="name">Gulaabi Sharara</div>
              <div class="artist">Inder Arya</div>
            </div>
            <div class="love">
              <img
                src="https://cdn-icons-png.flaticon.com/512/2589/2589175.png"
                alt="love"
              />
            </div>
          </div>
          <div class="playback">
            <div class="upper">
              <img
                src="https://cdn-icons-png.flaticon.com/512/724/724979.png"
                alt="shuffle"
              />
              <img
                src="https://cdn-icons-png.flaticon.com/512/3318/3318703.png"
                alt="back"
              />
              <img
                src="https://cdn-icons-png.flaticon.com/512/2088/2088562.png"
                alt="pause"
                class="pause"
              />
              <img
                src="https://cdn-icons-png.flaticon.com/512/4211/4211386.png"
                alt="forward"
              />
              <img
                src="https://cdn-icons-png.flaticon.com/512/4146/4146819.png"
                alt="loop"
              />
            </div>
            <div class="lower">
              <div class="text">0:00</div>
              <div class="line"></div>
              <div class="text">3:46</div>
            </div>
          </div>
          <div class="control">
            <div class="images">
              <img
                src="https://cdn-icons-png.flaticon.com/512/26/26615.png"
                alt="mic"
              />
              <img
                src="https://cdn-icons-png.flaticon.com/512/98/98068.png"
                alt="queue"
              />
              <img
                src="https://cdn-icons-png.flaticon.com/512/2777/2777142.png"
                alt="device"
              />
              <img
                src="https://cdn-icons-png.flaticon.com/512/25/25695.png"
                alt="volume"
              />
              <div class="line"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="App__main-view">
        <div class="App__top-gradient"></div>
        <div class="App__header-placeholder"></div>
        <section class="App__section App__quick-links">
          <h1>Good afternoon</h1>
          <div class="App__quick-links-container">
            <div class="App__quick-link">
              <div class="App__quick-link-featured-img">♥</div>
              <span>Liked Songs</span>
            </div>
            <div class="App__quick-link">
              <div class="App__quick-link-featured-img"></div>
              <span>Daily Mix 1</span>
            </div>
            <div class="App__quick-link">
              <div class="App__quick-link-featured-img"></div>
              <span>Discover Weekly</span>
            </div>
            <div class="App__quick-link">
              <div class="App__quick-link-featured-img"></div>
              <span>Daily Mix 2</span>
            </div>
            <div class="App__quick-link">
              <div class="App__quick-link-featured-img"></div>
              <span>Daily Mix 3</span>
            </div>
            <div class="App__quick-link">
              <div class="App__quick-link-featured-img"></div>
              <span>Daily Mix 4</span>
            </div>
          </div>
        </section>
        <section class="App__section App__your-shows">
          <div class="App__section-header">
            <h3>Your shows</h3>
            <span>SEE ALL</span>
          </div>
          <div class="App__section-grid-container">
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>TED Radio Hour</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Short Wave</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Post Reports</h3>
              <span>The Washington Post</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Planet Money</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>How I Built this...</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>TED Radio Hour</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Short Wave</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Post Reports</h3>
              <span>The Washington Post</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Planet Money</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>How I Built this...</h3>
              <span>NPR</span>
            </div>
          </div>
        </section>
        <section class="App__section App__your-shows">
          <div class="App__section-header">
            <h3>Your top mixes</h3>
            <span>SEE ALL</span>
          </div>
          <div class="App__section-grid-container">
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>TED Radio Hour</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Short Wave</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Post Reports</h3>
              <span>The Washington Post</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Planet Money</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>How I Built this...</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>TED Radio Hour</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Short Wave</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Post Reports</h3>
              <span>The Washington Post</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>Planet Money</h3>
              <span>NPR</span>
            </div>
            <div class="App__section-grid-item">
              <div class="featured-image"></div>
              <h3>How I Built this...</h3>
              <span>NPR</span>
            </div>
          </div>
        </section>
      </div>
    </div>
  </body>
</html>
