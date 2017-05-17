import React , { Component } from 'react';
import { render } from 'react-dom';
import { Provider , connect } from 'react-redux';
//import configureStore  from '../../js/App/src/store';
import { bindActionCreators } from 'redux';
import { Link } from 'react-router';
//import couponActions from '../../js/App/src/actions/couponActions'
//import { initialState } from '../../js/App/Constants';
//var store = configureStore(initialState);

export default class SearchForm extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <form className="form-inline search-bar" method="get"
                  action="/search">
                <div className="form-group">
                    <input type="text" className="form-control search-input" name="search" placeholder="Name"/>
                </div>
                <div className="form-group">
                    <select name="type" className="btn btn--wd dropdown-toggle" id="typeSelect">
                        <option value="">select user type</option>
                        <option value="2">individual</option>
                    </select>
                </div>

                <div className="form-group">
                    <select name="" className="btn btn--wd dropdown-toggle" id="elementSelect">
                        <option value="null">select post type</option>
                        <option value="news">news</option>
                        <option value="announcement">announcements</option>
                        <option value="presentation">presentations</option>
                    </select>
                </div>

                <div className="form-group">

                </div>

                <button type="submit" className="btn btn--grey">Search</button>
            </form>
        )
    }
}
