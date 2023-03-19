export interface Standings {
  conference: Season,
  division: Season,
  league: Season,
};

export interface Season {
  [key: string]: SeasonType[];
}

export interface SeasonType {
  [key: string]: Conference[] | Division[] | Team[];
}

export interface Conference {
  AFC: Team[];
  NFC: Team[];
}

export interface Division {
  East: Team[];
  North: Team[];
  South: Team[];
  West: Team[];
}

export interface Team {
  conference: string;
  conference_losses: number;
  conference_rank: number;
  conference_ties: number;
  conference_wins: number;
  division: string;
  division_losses: number;
  division_rank: number;
  division_ties: number;
  division_wins: number;
  id: number;
  losses: number;
  name: string;
  net_points: number;
  percentage: string;
  points_against: number;
  points_for: number;
  season: number;
  season_type: number;
  team: string;
  team_id: number;
  ties: number;
  touchdowns: number;
  wins: number;
}

export interface FilterData {
  [key: string]: string | number;
}
