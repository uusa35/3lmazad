/**
 * Created by usamaahmed on 5/17/17.
 */

import React , { Component } from 'react';
import { render } from 'react-dom';
import Routes from './App/Routes';
import $ from 'jquery';


$(document).ready(function () {
    console.log('App from react started');
    render(<Routes />, document.getElementById('App'));
});