import React , { Component } from 'react';
import { render } from 'react-dom';
import { connect } from 'react-redux';
import { Link , withRouter} from 'react-router-dom';
import * as actions from '../redux/actions';
import { initialState } from '../Constants';
import Header from './partials/Header';


class SearchForm extends Component {
    constructor(props) {
        super(props);
    }

    componentDidMount() {
        this.props.fetchAreas();
    }

    _onchangeArea(e) {
        console.log('changed area');
        console.log(e.target.value);
    }

    render() {
        console.log('from searchForm');
        return (
            <div>
                <Header />
                <form className="form-inline search-bar" method="get"
                      action="/search">
                    <div className="form-group">
                        <select name="area" className="btn btn--wd dropdown-toggle" onChange={this._onchangeArea}>
                            <option value="0">all areas</option>
                            {
                                this.props.properties.areas.map(function(a) {
                                    return <option value={a.id} key={a.id}>{a.name_en}</option>
                                })
                            }

                        </select>
                    </div>
                    <div className="form-group">
                        <select name="category" className="btn btn--wd dropdown-toggle" id="elementSelect">
                            <option value="null">select post type</option>
                            <option value="news">news</option>
                            <option value="announcement">announcements</option>
                            <option value="presentation">presentations</option>
                        </select>
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
