import React , { Component } from 'react';
import { render } from 'react-dom';
import { connect } from 'react-redux';
import { Link , withRouter} from 'react-router-dom';
import * as actions from '../redux/actions';
import { initialState } from '../Constants';
import Header from './partials/Header';
import $ from 'jquery';
$.fn.transition = require('semantic-ui-transition');
$.fn.dropdown = require('semantic-ui-dropdown');


class SearchForm extends Component {
    constructor(props) {
        super(props);
    }

    componentDidMount() {
        $('.ui.dropdown').dropdown({allowCategorySelection: true});
        this.props.fetchAreas();
    }

    _onChangeArea() {
        console.log('changed');
        let area_id = $('.selected').attr('value');
        console.log(area_id);
    }

    _onChangeCategory() {
        console.log('category changed');
        let category_id = $('.selected').attr('value');
        console.log(category_id);
    }

    render() {
        return (
            <div>
                <Header />
                <form className="form-inline search-bar" method="get"
                      action="/search">

                    <div className="ui floating dropdown labeled icon button" onClick={this._onChangeArea}>
                        <i className="filter icon"></i>
                        <span className="text" id="areas">Filter Areas</span>
                        <div className="menu">
                            <div className="ui icon search input">
                                <i className="search icon"></i>
                                <input placeholder="Search Areas..." type="text"/>
                            </div>
                            <div className="divider"></div>
                            <div className="scrolling menu">
                                {
                                    this.props.properties.areas.map(function(a) {
                                        return (
                                            <div className="item" key={a.id} value={a.id}>
                                                <div className="ui empty circular label"></div>
                                                {a.name_ar}
                                            </div>
                                        );
                                    })
                                }
                            </div>
                        </div>
                    </div>

                    <div className="ui dropdown button" onClick={this._onChangeCategory}>
                        <span className="text">Choose Category</span>
                        <i className="dropdown icon"></i>
                        <div className="menu">
                            <div className="item" value="1">
                                <span className="text">Category 1</span>
                            </div>
                            <div className="item">
                                <i className="folder icon"></i>
                                <span className="text">Cars</span>
                                <div className="menu">
                                    <div className="item">
                                        <i className="folder icon"></i>
                                        <span className="text">Cars For Sale</span>
                                    </div>
                                    <div className="item">Item 2B</div>
                                    <div className="item">Item 2C</div>
                                </div>
                            </div>
                            <div className="item">
                                <i className="dropdown icon"></i>
                                <span className="text">Category 2</span>
                                <div className="menu">
                                    <div className="item">Item 2A</div>
                                    <div className="item">Item 2B</div>
                                    <div className="item">Item 2C</div>
                                </div>
                            </div>
                            <div className="item">
                                <i className="dropdown icon"></i>
                                <span className="text">Category 3</span>
                                <div className="menu">
                                    <div className="item">Item 3A</div>
                                    <div className="item">Item 3B</div>
                                    <div className="item">Item 3C</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="form-group">
                        <input type="text" className="form-control search-input" name="search" placeholder="Name"/>
                    </div>

                    <div className="form-group">
                        <input type="text" className="form-control search-input" name="min" placeholder="from"/>
                    </div>

                    <div className="form-group">
                        <input type="text" className="form-control search-input" name="max" placeholder="to"/>
                    </div>

                    <button type="submit" className="btn btn--grey">Search</button>
                </form>
            </div>
        )
    }
}


function mapStateToProps(state) {
    return state;
}

export default connect(mapStateToProps, actions)(SearchForm);
