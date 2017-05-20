import React , { Component } from 'react';
import { render } from 'react-dom';
import { connect } from 'react-redux';
import { Link , withRouter} from 'react-router-dom';
import * as actions from '../redux/actions';
import { initialState } from '../Constants';
import Header from './partials/Header';
import AreaField from './partials/AreaField';
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
                <form className="search-bar" method="get"
                      action="{{ route('search') }}">
                    <div className="main-fields">
                        <AreaField areas={this.props.properties.areas}/>

                        <div className="ui icon input">
                            <i className="search icon"></i>
                            <input type="text" className="search-input search-input-keyword toottip-message"
                                   data-content="{{ trans('message.keyword_search') }}" name="search"
                                   data-variation="inverted"
                                   placeholder="{`trans('general.keyword')`}"/>
                        </div>

                        <div className="ui right icon input">
                            <i className="chevron circle down icon"></i>
                            <input type="text" className="search-input search-input-min toottip-message" name="min"
                                   data-content="{{ trans('message.min_search') }}"
                                   data-variation="inverted"
                                   placeholder={`trans('general.price_min')`}/>
                        </div>


                        <div className="ui icon input">
                            <i className="chevron circle up icon"></i>
                            <input type="text" className="search-input search-input-max toottip-message" name="max"
                                   data-content={`trans('message.max_search')`}
                                   data-variation="inverted"
                                   placeholder={`trans('general.price_max')`}/>
                        </div>
                    </div>

                    <div className="sub-fields">
                    </div>

                    <button className="ui labeled icon brown button search-input" type="submit">
                        <i className="search icon"></i>
                        {`trans('general.search')`}
                    </button>
                </form>
            </div>
        )
    }
}


function mapStateToProps(state) {
    return state;
}

export default connect(mapStateToProps, actions)(SearchForm);
