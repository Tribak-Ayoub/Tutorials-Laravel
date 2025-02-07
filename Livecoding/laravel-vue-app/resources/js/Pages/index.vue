<template>
    <div>
        <h1>Products</h1>

        <!-- Create Product Button -->
        <button @click="openCreateModal">Create Product</button>

        <!-- Products Table -->
        <table v-if="products.length > 0" border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.name }}</td>
                    <td>{{ product.description }}</td>
                    <td>${{ product.price }}</td>
                    <td>
                        <button @click="deleteProduct(product.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Message if no products available -->
        <p v-else>No products available.</p>

        <!-- Error Message -->
        <div v-if="error" style="color: red;">
            Error loading products: {{ error }}
        </div>

        <!-- Create Product Modal -->
        <div v-if="showModal" class="modal">
            <div class="modal-content">
                <h2>Create Product</h2>
                <form @submit.prevent="createProduct">
                    <div>
                        <label for="name">Product Name</label>
                        <input type="text" v-model="newProduct.name" required />
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea v-model="newProduct.description" required></textarea>
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="number" v-model="newProduct.price" required min="0" />
                    </div>
                    <div>
                        <button type="submit">Create Product</button>
                        <button type="button" @click="closeCreateModal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],  // Store the products
            error: null,   // To store any errors
            showModal: false,  // Controls the visibility of the create modal
            newProduct: {  // Stores the new product data
                name: '',
                description: '',
                price: 0
            },
        };
    },
    mounted() {
        this.fetchProducts();
    },
    methods: {
        async fetchProducts() {
            try {
                const response = await fetch('/products');
                const data = await response.json();
                this.products = data;
            } catch (error) {
                this.error = 'Failed to load products';
            }
        },
        
        async deleteProduct(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                try {
                    const response = await fetch(`/products/${productId}`, {
                        method: 'DELETE',
                    });
                    if (response.ok) {
                        // Remove the deleted product from the list
                        this.products = this.products.filter(product => product.id !== productId);
                    } else {
                        this.error = 'Failed to delete product';
                    }
                } catch (error) {
                    this.error = 'Failed to delete product';
                }
            }
        },
        
        openCreateModal() {
            this.showModal = true;
        },
        
        closeCreateModal() {
            this.showModal = false;
            this.newProduct = { name: '', description: '', price: 0 };  // Reset the form
        },

        async createProduct() {
            try {
                const response = await fetch('/products', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify(this.newProduct),
                });

                if (response.ok) {
                    const newProduct = await response.json();
                    this.products.push(newProduct);  // Add the new product to the list
                    this.closeCreateModal();  // Close the modal
                } else {
                    this.error = 'Failed to create product';
                }
            } catch (error) {
                this.error = 'Failed to create product';
            }
        }
    }
};
</script>

<style scoped>
h1 {
    color: #2d3748;
}
table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
    text-align: left;
}
th {
    background-color: #f4f4f4;
}
button {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}
button:hover {
    background-color: #e53935;
}
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}
.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    width: 300px;
}
.modal-content form {
    display: flex;
    flex-direction: column;
}
.modal-content input, .modal-content textarea {
    margin-bottom: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
</style>
