const addGame = document.querySelector(".add-game");
console.log(addGame);
const gameForm = document.querySelector(".main-div");

addGame.addEventListener("click", () => {
  console.log("yes");
  gameForm.innerHTML = `<div class = "box">
  <form action="" method="post">
    <div class="input-box">
      <input type="text" name="name" id="name" autocomplete="off" required />
      <label for="name">Name</label>
    </div>
    <div class="input-box">
      <input type="text" name="publisher" id="publisher" autocomplete="off" required />
      <label for="publisher">Publisher</label>
    </div>
    <div class="input-box">
      <input type="text" name="genre" id="genre" autocomplete="off" required />
      <label for="genre">Genre</label>
    </div>
    <div class="input-box">
      <input type="text" name="platforms" id="platforms" autocomplete="off" required />
      <label for="platforms">Platforms</label>
    </div>
    <div class="input-box">
      <input type="text" name="price" id="price" autocomplete="off" required />
      <label for="price">Price</label>
    </div>
    <div class="input-box">
      <input type="text" name="copies sold" id="copies sold" autocomplete="off" required />
      <label for="copies sold">Copies Sold</label>
    </div>
    <input type="submit" value="Add" />
  </form>
</div>`;
});
