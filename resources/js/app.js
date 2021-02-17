const { default: axios } = require('axios');

require('./bootstrap');
import Vue from 'vue';

var app = new Vue(
    {
        el: '#app',
        data: {
            books: [],
            price: 100
        },
        mounted: function() {
            var self = this;
            axios   
                .get('http://127.0.0.1:8000/api/books')
                .then( function(response) {
                    console.log(response.data);
                    self.books = response.data;
                    // console.log(response.data[4]["title"]);
                });
        },
        methods: {
            cerca: function() {
                var self = this;
                axios   
                .get('http://127.0.0.1:8000/api/cheaper-than/' + self.price)
                .then( function(response) {
                    console.log(response.data);
                    self.books = response.data;
                    // console.log(response.data[4]["title"]);
                });
            }
        }
    }
);


