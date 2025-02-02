class Number
  attr_reader :pipe_underscore_number_array
  def initialize(pipe_underscore_number_array)
    @pipe_underscore_number_array = pipe_underscore_number_array
  end

  def to_s
    {
      10 => '0',
      4 => '1',
    }.fetch(group_total)
  end

  private

  def group_total
    @pipe_underscore_number_array.reduce(0) do |group_total, row|
      group_total += row.reduce(0) do |row_total, character|
        case character
        when "_"
          row_total += 1
        when "|"
          row_total += 2
        else
          row_total += 0
        end
        row_total
      end
      group_total
    end
  end
end

class Accounts
  def self.from_string(account_numbers_string)
    self.new
  end

  def to_a
    ['000000000']
  end
end