export class singleDiv {
    constructor() {
      this.singleDiv = document.querySelector('.single');
    }
    hide() {
      this.singleDiv.style.display = "none";
    }
  
    show() {
      this.singleDiv.style.display = "block";
    }
  }