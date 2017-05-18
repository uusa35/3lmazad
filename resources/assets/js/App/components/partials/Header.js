/**
 * Created by usamaahmed on 5/17/17.
 */
import React , { Component } from 'react';
import { Link } from 'react-router-dom';

export default class Header extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div>
                <ul>
                    <li><Link to="/">Home</Link></li>
                    <li><Link to="search">search</Link></li>
                    <li><Link to="/about">About</Link></li>
                    <li><Link to="/contact">contact</Link></li>
                    <li><Link to="/commercial/create">create</Link></li>
                </ul>
            </div>
        );
    }
}