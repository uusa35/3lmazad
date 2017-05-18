/**
 * Created by usamaahmed on 5/17/17.
 */
import React , { Component } from 'react';

export default class About extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        console.log('from about');
        return (
            <div>
                <h1>About us</h1>
            </div>
        );
    }
}