<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Acopio</title>
    <link rel="stylesheet" href="styles/stylesInformeAcopio.css">
</head>
<body>

<header class="header-container">
        <div class="back-btn" onclick="window.history.back()"><- Regresar</div>
        <div class="logo-container" >
            <img src="logo.png" alt="Logo de la empresa" class="logo">
            <h1>Alimenta Hoy</h1>
        </div>
    </header>

    <div class="product-selection">
        <div class="product-table">
            <table>
                <thead>
                    <tr>
                        <th>Seleccionar</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Detalles</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" name="selectProduct" onchange="updateTicket(1, 'Harina', 50)"></td>
                        <td>Harina</td>
                        <td>
                            <div class="counter">
                                <! A qui tenemos que poner el valor minimo o maximo que le digamos->
                                <button onclick="decrease(1, 50)">-</button>
                                <span id="count1">1</span>
                                <button onclick="increase(1, 50)">+</button>
                            </div>
                        </td>
                        <td>Harian la fina</td>
                        <td>$50</td>
                        <td>Harinas</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="selectProduct" onchange="updateTicket(2, 'Lechuga', 70)"></td>
                        <td>Lechuga</td>
                        <td>
                            <div class="counter">
                                <button onclick="decrease(2, 70)">-</button>
                                <span id="count2">1</span>
                                <button onclick="increase(2, 70)">+</button>
                            </div>
                        </td>
                        <td>Lechuga romana</td>
                        <td>$70</td>
                        <td>Fruta y verduras</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="selectProduct" onchange="updateTicket(3, 'Carne de res', 60)"></td>
                        <td>Carne de res</td>
                        <td>
                            <div class="counter">
                                <button onclick="decrease(3, 60)">-</button>
                                <span id="count3">1</span>
                                <button onclick="increase(3, 60)">+</button>
                            </div>
                        </td>
                        <td>Carne 100% de res</td>
                        <td>$60</td>
                        <td>Carnes frias y Embutidos</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="ticket">
        <h2>Ticket</h2>
        <div class="ticket-content" id="ticket-content">
            <p>No hay productos seleccionados</p>
        </div>
        <div class="ticket-summary" id="ticket-summary">
            Total: $0
        </div>
    </div>



    <script>
        let selectedProducts = {};
        let total = 0;

        function updateTicket(id, name, price) {
            const checkbox = event.target;
            const countElement = document.getElementById('count' + id);
            let count = parseInt(countElement.textContent);

            if (checkbox.checked) {
                selectedProducts[id] = { name, count, price };
            } else {
                delete selectedProducts[id];
            }

            renderTicket();
        }

        function increase(id, price) {
            let countElement = document.getElementById("count" + id);
            let count = parseInt(countElement.textContent);
            count++;
            countElement.textContent = count;

            if (selectedProducts[id]) {
                selectedProducts[id].count = count;
            }

            renderTicket();
        }

        function decrease(id, price) {
            let countElement = document.getElementById("count" + id);
            let count = parseInt(countElement.textContent);
            if (count > 1) {
                count--;
                countElement.textContent = count;

                if (selectedProducts[id]) {
                    selectedProducts[id].count = count;
                }
            }

            renderTicket();
        }

        function renderTicket() {
            const ticketContent = document.getElementById('ticket-content');
            const ticketSummary = document.getElementById('ticket-summary');
            ticketContent.innerHTML = '';
            total = 0;

            if (Object.keys(selectedProducts).length === 0) {
                ticketContent.innerHTML = '<p>No hay productos seleccionados</p>';
            } else {
                for (let id in selectedProducts) {
                    const product = selectedProducts[id];
                    const productTotal = product.count * product.price;
                    total += productTotal;

                    ticketContent.innerHTML += `<p>${product.name} x${product.count} - $${productTotal}</p>`;
                }
            }

            ticketSummary.textContent = `Total: $${total}`;
        }
    </script>
</body>
</html>