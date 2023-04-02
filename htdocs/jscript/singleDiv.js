export class singleDiv {
    constructor() {
      this.singleDiv = document.querySelector('.single');
    }
    hide() {
      this.singleDiv.style.display = "none";
    }
  
    show() {
    console.log("triggered");
      this.singleDiv.style.display = "block";
    }
  }