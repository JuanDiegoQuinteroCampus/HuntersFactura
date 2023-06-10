import styles from "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" assert { type: "css" };
export class myBody extends HTMLElement {
    constructor() {
        super();
        document.adoptedStyleSheets.push(styles);
    }
    async components() {
        return await (await fetch("view/my-body.html")).text();
    }
    async add(e) {
        let $ = e.target;
        if ($.nodeName == "BUTTON") {
            const form = document.createElement("div");
            form.innerHTML = `
                <my-product-details></my-product-details>
            `;
            document.querySelector("#products").appendChild(form);
        }
    }
    
    async send(e){
        
        let input = document.querySelectorAll("input");
        let fromInput = 7, fromProduct = 4;
        let info = {}, producto = {}, lista = {}, data = {}, count = 0;
        producto.product = [];
        input.forEach((val, id) => {
            if (id <= fromInput) {
                info[val.name] = val.value;
            } else if (count <= fromProduct) {
                lista[val.name] = val.value;
                count++;
                if (count == fromProduct) {
                producto.product.push(lista);
                lista = {};
                count = 0;
                }
            }
        });
        data.info = info;
        data.producto = producto.product;

        console.log(JSON.stringify(data));
        // let peticio = await fetch("uploads/app.php");
        // let res = await peticio.text();
        // document.querySelector("pre").innerHTML = res;
    }
    connectedCallback() {
        this.components().then(html => {
            this.innerHTML = html;
            this.add = this.querySelector("#add").addEventListener("click", this.add.bind(this));
            this.send = this.querySelector("#send").addEventListener("click", this.send.bind(this));
        })
    }
}
customElements.define('my-body', myBody);

