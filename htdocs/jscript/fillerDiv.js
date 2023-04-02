export class fillerDiv {
    constructor() {
      this.fillerDiv = document.querySelector('.filler');
    }
    hide() {
      this.fillerDiv.style.display = "none";
    }
  
    show() {
    console.log("triggered");
      this.fillerDiv.style.display = "block";
    }
  }