/**
 * todo: Miguel del futuro arregle esto ▼ 
 * ? Esta una Mier.....da :)
 * @var styles
 */
import styles from "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" assert { type: "css" };
export class myHeader extends HTMLElement{
    constructor(){
        super();
    }
    async components(){
        return await (await fetch("view/my-header.html")).text();
    }
    connectedCallback() {
        document.adoptedStyleSheets.push(styles);
        this.components().then(html=>{
            this.innerHTML=html;
        })
    }
}
customElements.define("my-header",myHeader);