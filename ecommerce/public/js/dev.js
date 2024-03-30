  
  
  document.querySelectorAll('.next').forEach(button => {
        button.addEventListener('click', () => {
            const quantityInput = button.parentElement.querySelector('.cartNumber');
            const currentQuantity = parseInt(quantityInput.value);
            const price = parseFloat(button.parentElement.getAttribute('data-price')); // Récupérer le prix à partir de l'attribut data-price
            const totalPriceElement = document.getElementById('cart-total-value');
            const currentTotal = parseFloat(totalPriceElement.value);
            
            quantityInput.value = currentQuantity + 1;
            const newTotal = currentTotal + price;
            totalPriceElement.value = newTotal.toFixed(2);
          
        
        });
    });
    
 
    document.querySelectorAll('.prev').forEach(button => {
        button.addEventListener('click', () => {
            const quantityInput = button.parentElement.querySelector('.cartNumber');
            const currentQuantity = parseInt(quantityInput.value);
            const price = parseFloat(button.parentElement.getAttribute('data-price'));
            const totalPriceElement = document.getElementById('cart-total-value');
            const currentTotal = parseFloat(totalPriceElement.value);
            
            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
                const newTotal = currentTotal - price; // Soustraire le prix du produit du prix total
                totalPriceElement.value = newTotal.toFixed(2);
            }
           
        });
    });
   



    /*
        $('#checkout-link').on('click', function(e) {
            e.preventDefault();
          
            var productId = $(this).data('product-id');
            var quantity = $('.cartNumber').val();
            var url = "{{ route('products.checkout', ['product' => ':productId', 'quantity' => ':quantity']) }}";
            url = url.replace(':productId', productId);
            url = url.replace(':quantity', quantity);
            window.location.href = url;
        });
   */
    

    

//le nombre de produit dans panier :

const numberOfProducts = document.querySelectorAll('#nbr-of-product').length;
document.getElementById('number-of-product').innerText = numberOfProducts;

//sheckout
//city dynamique

    const citiesByCountry = {
        Morocco: ['Casablanca', 'Rabat', 'Marrakech','fes','tanger','oujda','tetouan','nador'],
        France: ['Paris', 'Marseille', 'Lyon'],
        Espagne: ['Malaga ', 'Barcelone ', 'Madrid ','Valence '],
        Allemagne: ['Berlin','Hambourg', 'Munich', 'Cologne'],
      
    };
    const test=document.getElementById('test');
    const h2=document.getElementById('h2');
    h2.value="hfffffffffffffffffffkskjak"
    test.value='lorem*100ijassjkfaaaaaaaaaaaaaaaaaaaaaa';
    const countrySelect = document.getElementById('country');
    countrySelect.value='chchchchhc';
    const citySelect = document.getElementById('city');

    countrySelect.addEventListener('change', function() {
        const selectedCountry = this.value;
        const cities = citiesByCountry[selectedCountry] || [];

        // Effacez les anciennes options de la liste des villes
        citySelect.innerHTML = '<option value="">Sélectionner une ville</option>';

        // Ajoutez les nouvelles options de ville à partir du tableau de villes
        cities.forEach(city => {
            const option = document.createElement('option');
            option.value = city;
            option.textContent = city;
            citySelect.appendChild(option);
        });
    });


// pour que nbr 
