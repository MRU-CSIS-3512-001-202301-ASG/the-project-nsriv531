export class fillerDiv {
    constructor() {
      this.fillerDiv = document.querySelector('.filler');
    }
    hide() {
      this.fillerDiv.style.display = "none";
    }
  
    show() {
      this.fillerDiv.style.display = "grid";
    }
  }